@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{ route('all.teacher') }}" class="btn btn-success">All teacher</a>
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ url('update/teacher/'.$teacher->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Teacher Name</label>
              <input type="text" class="form-control" value="{{ $teacher->teacher_name }}" placeholder="student Name" name="student_name" id="name" required> 
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label> Teacher id </label>
              <input type="text" class="form-control" value="{{ $teacher->teacher_id }}" placeholder="Student ID" name="student_id" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Teacher  Image</label>
              <input type="file" class="form-control"  placeholder="Enter Image" id="phone" name="student_image">
             Current Image:  <img src="{{ url($teacher->teacher_image) }}" style="height: 70px; width:40px">
             <input type="hidden" name="old_photo" value="{{ $teacher->teacher_image }}">
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Teacher Dept</label>
              <Select class="form-control" name="dept">
              <option>Choose</option>  
              @foreach($dept as $depts)
                <option value="{{ $depts->id }}"<?php if($teacher->teacher_dept == $depts->dept_id) echo "selected"; ?>>{{ $depts->dept_name }}</option>
                @endforeach
              </Select>
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