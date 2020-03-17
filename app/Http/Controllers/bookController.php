<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Node\FunctionNode;

class bookController extends Controller
{
    public function add()
    {
        return view('book.add_book');
    }
    public function store(Request $requset)
    {
        $validatedata = $requset->validate([
            'book_name' => 'required|max:50|min:6',
            'book_id' => 'required|max:50|min:1',
            'book_details' => 'required|max:250',
            'book_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $data = array();
        $data['book_name'] = $requset->book_name;
        $data['book_id'] = $requset->book_id;
        $data['book_details'] = $requset->book_details;
        $image = $requset->file('book_image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'frontend/image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['book_image'] = $image_url;
            DB::table('books')->insert($data);
            $notification = array(
                'message' => 'Successfully Book inserted',
                'alert-type' => 'success'
            );
            return redirect()->route('all.books')->with($notification);
        } else {
            DB::table('books')->insert($data);
            $notification = array(
                'message' => 'Successfully book inserted',
                'alert-type' => 'success'
            );
            return redirect()->route('all.books')->with($notification);
        }
    }
    public function all()
    {
        $book = DB::table('books')->get();
        return view('book.all_books', compact('book'));
    }
    public function edit($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        return view('book.edit_book', compact('book'));
    }
    public function update(Request $request, $id)
    {

        $validatedata = $request->validate([
            'book_name' => 'required|max:50|min:6',
            'book_id' => 'required|max:50|min:1',
            'book_details' => 'required|max:250',
            'book_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $data = array();
        $data['book_name'] = $request->book_name;
        $data['book_id'] = $request->book_id;
        $data['book_details'] = $request->book_details;
        $image = $request->file('book_image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'frontend/image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['book_image'] = $image_url;
            unlink($request->old_photo);
            DB::table('books')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully Book Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.books')->with($notification);
        } else {
            $data['book_image'] = $request->old_photo;
            DB::table('books')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully book Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('all.books')->with($notification);
        }
    }
    public function delete($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        $image = $book->book_image;
        $delete = DB::table('books')->where('id', $id)->delete();
        if ($delete) {
            unlink($image);
            $notification = array(
                'message' => 'Successfully book deleted',
                'alert-type' => 'success'
            );
            return redirect()->route('all.books')->with($notification);
        }else{
            $notification = array(
                'message' => 'Something went worng',
                'alert-type' => 'error'
            );
            return redirect()->route('all.books')->with($notification);
        }
    }
}
