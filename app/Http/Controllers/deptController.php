<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class deptController extends Controller
{
    public function index()
    {
    return view('department.add_department');
    }
    public function store(Request $request){
        $validatedata=$request->validate([
            'dept_name'=>'required|unique:depts|max:20|min:2',
            'dept_id' =>'required|unique:depts|max:20|min:1'   
        ]);
        $data=array();
        $data['dept_name']=$request->dept_name;
        $data['dept_id']=$request->dept_id;
        $department=DB::table('depts')->insert($data);
        if($department){
            $notification=array(
            'message'=>'Successfully inserted Department name',
            'alert-type'=>'success'
            );return redirect()->route('all.dept')->with($notification);
        }else
        $notification=array(
            'message'=>'Something wrong in Data',
            'alert-type'=>'success'
        );return redirect()->route('all.dept')->with($notification);
       
    }
    public function all(){
        $department = DB::table('depts')->get();
        return view('department.all_department',compact('department'));
    }
    public function edit($id){
        $department=DB::table('depts')->where('id',$id)->first();
       return view('department.edit_department',compact('department'));
    }
    public function update(request $request, $id){
        $validatedata=$request->validate([
            'dept_name'=>'required|max:200|min:3',
            'dept_id' =>'required|max:50|min:1'   
        ]);
        $data=array();
        $data['dept_name']=$request->dept_name;
        $data['dept_id']=$request->dept_id;
        $department=DB::table('depts')->where('id',$id)->update($data);
        if($department){
            $notification=array(
            'message'=>'Successfully updated Department informatin',
            'alert-type'=>'success'
            );return redirect()->route('all.dept')->with($notification);
        }else
        $notification=array(
            'message'=>'Nothing to update',
            'alert-type'=>'success'
        );return redirect()->route('all.dept')->with($notification);
       
    }
    public function  delete($id){
            $department=DB::table('depts')->where('id',$id)->delete();
            $notification=array(
                'message'=>'Successfully deleted department',
                'alert-type'=>'success'
                );return redirect()->route('all.dept')->with($notification);
    }


}
