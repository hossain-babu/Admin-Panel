@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('all.course')}}" class="btn btn-danger">All Course</a>
      <hr>
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      <form action=" {{ url('update/course/'.$course->id) }}" method="post">
        @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label> Course Name</label>
            <input type="text" class="form-control" value="{{ $course->course_name }}" placeholder="Name" name="dept_name">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>course ID</label>
            <input type="text" class="form-control" value="{{ $course->course_id }}" placeholder="Department Id" name="dept_id" >
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