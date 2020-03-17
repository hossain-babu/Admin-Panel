<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    public function add(){
        $dept=DB::table('depts')->get();
        return view('student.add_student',compact('dept'));
    }
    public function store(Request $request){
        $validatedata = $request->validate([
            'student_name' => 'required|max:50|min:6',
            'student_id' => 'required|max:50|min:1',
            'student_password' => 'required|max:50|min:1',
            'student_phone' => 'required|max:20|min:11',
            'student_father' => 'required|max:50',
            'student_father' => 'required|max:50',
            'student_mother' => 'required|max:50',
            'student_address' => 'required|max:200|min:5',
            'student_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $data=array();
        $data['student_name']=$request->student_name;
        $data['stu_id']=$request->student_id;
        $data['stu_pass']=$request->student_password;
        $data['stu_phn']=$request->student_phone;
        $data['stu_dept']=$request->dept;
        $data['father_name']=$request->student_father;
        $data['mother_name']=$request->student_mother;
        $data['student_address']=$request->student_address;
        $image = $request->file('student_image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'frontend/student_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['stu_image'] = $image_url;
            DB::table('students')->insert($data);
            $notification = array(
                'message' => 'Successfully Student Added into the database',
                'alert-type' => 'success'
            );
            return redirect()->route('all.students')->with($notification);
        } else {
            DB::table('students')->insert($data);
            $notification = array(
                'message' => 'Successfully Student Added to the database',
                'alert-type' => 'success'
            );
            return redirect()->route('all.students')->with($notification);
        }

    }
    public function all(){
        $student=DB::table('students')
        ->join('depts','students.stu_dept','depts.dept_id')
        ->select('students.*','depts.dept_name')
        ->get();
        // return response()->json($student);
         return view('student.all_student',compact('student'));
    }
    public function view($id){
        $student=DB::table('students')
        ->join('depts','students.stu_dept','depts.dept_id')
        ->select('students.*','depts.dept_name')
        ->where('students.id',$id)
        ->first();
        return view('student.view_student',compact('student'));
    }
    public function edit($id){
     $dept=DB::table('depts')->get();
     $student=DB::table('students')->where('id',$id)->first();
     return view('student.edit_student',compact('student','dept'));
    }
    public function update(Request $request,$id){
        $validatedata = $request->validate([
            'student_name' => 'required|max:50|min:6',
            'student_id' => 'required|max:50|min:1',
            'student_password' => 'required|max:50|min:1',
            'student_phone' => 'required|max:20|min:11',
            'student_father' => 'required|max:50',
            'student_father' => 'required|max:50',
            'student_mother' => 'required|max:50',
            'student_address' => 'required|max:200|min:5',
            'student_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $data=array();
        $data['student_name']=$request->student_name;
        $data['stu_id']=$request->student_id;
        $data['stu_pass']=$request->student_password;
        $data['stu_phn']=$request->student_phone;
        $data['stu_dept']=$request->dept;
        $data['father_name']=$request->student_father;
        $data['mother_name']=$request->student_mother;
        $data['student_address']=$request->student_address;
        $image = $request->file('student_image');
        if ($image) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'frontend/student_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data['stu_image'] = $image_url;
            unlink($request->old_photo);
            DB::table('students')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Successfully updated student information',
                'alert-type' => 'success'
            );
            return redirect()->route('all.students')->with($notification);
        } else {
            $data['stu_image']=$request->student_image;
            DB::table('students')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Successfully updated student information',
                'alert-type' => 'success'
            );
            return redirect()->route('all.students')->with($notification);
        }

    }
    public function delete($id){
        $student =  DB::table('students')->where('id',$id)->first();
        $image = $student->stu_image;
        $delete=DB::table('students')->where('id',$id)->delete();
        if($delete){
            unlink($image);
        $notification = array(
            'message' => 'Successfully Deleted student information',
            'alert-type' => 'success'
        );
        return redirect()->route('all.students')->with($notification);
    }else{
        $notification = array(
            'message' => 'Something Wrong',
            'alert-type' => 'alert'
        );
        return redirect()->route('all.students')->with($notification);
    }
    }
}
