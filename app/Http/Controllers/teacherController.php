<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class teacherController extends Controller
{
    public function add()
    {
        $dept = DB::table('depts')->get();
        return view('teacher.add_teacher', compact('dept'));
    }
    public function store(Request $request)
    {
        $validatedata = $request->validate([
            'teacher_name' => 'required|max:50|min:6',
            'teacher_id' => 'required|max:50|min:1',
            'teacher_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $data = array();
        $data['teacher_name'] = $request->teacher_name;
        $data['teacher_id'] = $request->teacher_id;
        $data['teacher_dept'] = $request->teacher_dept;
        $image = $request->file('teacher_image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'frontend/teacher_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['teacher_image'] = $image_url;
            DB::table('teachers')->insert($data);
            $notification = array(
                'message' => 'Successfully teacher Added into the database',
                'alert-type' => 'success'
            );
            return redirect()->route('all.teacher')->with($notification);
        } else {
            DB::table('teachers')->insert($data);
            $notification = array(
                'message' => 'Successfully teacher Added to the database',
                'alert-type' => 'success'
            );
            return redirect()->route('all.teacher')->with($notification);
        }
    }
    public function all()
    {
        $teacher = DB::table('teachers')
            ->join('depts', 'teachers.teacher_dept', 'depts.dept_id')
            ->select('teachers.*', 'depts.dept_name')
            ->get();
        // return response()->json($student);
        return view('teacher.all_teacher', compact('teacher'));
    }
    public function view($id)
    {
        $teacher = DB::table('teachers')
            ->join('depts', 'teachers.teacher_dept', 'depts.dept_id')
            ->select('teachers.*', 'depts.dept_name')
            ->where('teachers.id', $id)
            ->first();
        return view('teacher.view_teacher', compact('teacher'));
    }
    public function edit($id)
    {
        $dept = DB::table('depts')->get();
        $teacher = DB::table('teachers')->where('id', $id)->first();
        return view('teacher.edit_teacher', compact('teacher', 'dept'));
    }
    public function update(Request $request, $id)
    {
        $validatedata = $request->validate([
            'teacher_name' => 'required|max:50|min:6',
            'teacher_id' => 'required|max:50|min:1',
            'teacher_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);
        $data = array();
        $data['teacher_name'] = $request->teacher_name;
        $data['teacher_id'] = $request->teacher_id;
        $data['teacher_dept'] = $request->teacher_dept;
        $image = $request->file('teacher_image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'frontend/teacher_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['teacher_image'] = $image_url;
            unlink($request->old_photo);
            DB::table('teachers')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully updated teacher information',
                'alert-type' => 'success'
            );
            return redirect()->route('all.teacher')->with($notification);
        } else {
            $data['teacher_image'] = $request->teacher_image;
            DB::table('teachers')->where('id', $id)->update($data);
            $notification = array(
                'message' => 'Successfully updated teacher information',
                'alert-type' => 'alert'
            );
            return redirect()->route('all.teacher')->with($notification);
        }
    }
    public function delete($id){
        $teacher =  DB::table('teachers')->where('id',$id)->first();
        $image = $teacher->teacher_image;
        $delete=DB::table('teachers')->where('id',$id)->delete();
        if($delete){
            unlink($image);
        $notification = array(
            'message' => 'Successfully Deleted teacher information',
            'alert-type' => 'success'
        );
        return redirect()->route('all.teacher')->with($notification);
    }else{
        $notification = array(
            'message' => 'Something Wrong',
            'alert-type' => 'alert'
        );
        return redirect()->route('all.teacher')->with($notification);
    }
    }
}
