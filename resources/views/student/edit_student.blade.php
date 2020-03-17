@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{ route('all.students') }}" class="btn btn-success">All Students</a>
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ url('update/student/'.$student->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" value="{{ $student->student_name }}" placeholder="student Name" name="student_name" id="name" required> 
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label> Student id </label>
              <input type="text" class="form-control" value="{{ $student->stu_id }}" placeholder="Student ID" name="student_id" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Student Image</label>
              <input type="file" class="form-control"  placeholder="Enter Image" id="phone" name="student_image">
             Current Image;  <img src="{{ url($student->stu_image) }}" style="height: 70px; width:40px">
             <input type="hidden" name="old_photo" value="{{ $student->stu_image }}">
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Password</label>
              <input type="text" class="form-control" value="{{ $student->stu_pass }}" placeholder="Student Password" name="student_password" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Dept</label>
              <Select class="form-control" name="dept">
              <option>Choose</option>  
              @foreach($dept as $depts)
                <option value="{{ $depts->id }}"<?php if($student->stu_dept == $depts->dept_id) echo "selected"; ?>>{{ $depts->dept_name }}</option>
                @endforeach
              </Select>

            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="text" class="form-control" placeholder="Phone Number" name="student_phone" value="{{ $student->stu_phn }}" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Father Name</label>
              <input type="text" class="form-control" placeholder="Father Name" name="student_father" value="{{ $student->father_name }}" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Mother Name</label>
              <input type="text" class="form-control" placeholder="Mother Name" name="student_mother" value="{{ $student->mother_name }}" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Address</label>
              <input type="text" class="form-control" placeholder="Permenant Address" name="student_address" value="{{ $student->student_address }}" id="name" required> 
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection