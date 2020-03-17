<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class courseController extends Controller
{
    public function add(){
        return view('course.add_course');
    }
    public function store(Request $request){
        $validatedata=$request->validate([
            'course_name'=>'required|unique:courses|min:2',
            'course_id' =>'required|unique:courses|min:1'   
        ]);
        $data=array();
        $data['course_name']=$request->course_name;
        $data['course_id']=$request->course_id;
        $courses=DB::table('courses')->insert($data);
        if($courses){
            $notification=array(
            'message'=>'Successfully inserted Course name',
            'alert-type'=>'success'
            );return redirect()->back()->with($notification);
        }else
        $notification=array(
            'message'=>'Something wrong in Data',
            'alert-type'=>'success'
        );return redirect()->back()->with($notification);
    }
    public function all(){
        $course = DB::table('courses')->get();
        return view('course.all_course',compact('course'));
    }
    public function edit($id){
        $course=DB::table('courses')->where('id',$id)->first();
       return view('course.edit_course',compact('course'));
    }
    public function update(request $request, $id){
        $validatedata=$request->validate([
            'course_name'=>'max:200|min:3',
            'course_id' =>'max:50|min:1'   
        ]);
        $data=array();
        $data['course_name']=$request->course_name;
        $data['course_id']=$request->course_id;
        $course=DB::table('courses')->where('id',$id)->update($data);
        if($course){
            $notification=array(
            'message'=>'Successfully updated Department informatin',
            'alert-type'=>'success'
            );return redirect()->route('all.course')->with($notification);
        }else
        $notification=array(
            'message'=>'Nothing to update',
            'alert-type'=>'success'
        );return redirect()->route('all.course')->with($notification);
       
    }
    public function  delete($id){
        $course=DB::table('courses')->where('id',$id)->delete();
        $notification=array(
            'message'=>'Successfully deleted department',
            'alert-type'=>'success'
            );return redirect()->route('all.dept')->with($notification);
}

       
}
