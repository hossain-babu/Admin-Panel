@extends('welcome')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <a href="{{route('add.teacher')}}" class="btn btn-danger">Add teacher</a>
    <a href="{{route('all.teacher')}}" class="btn btn-danger">All teacher</a>
      <div>
        <img src="{{ url($teacher->teacher_image) }}" style="height: 200px; width:auto">
        <p>teacher Name:{{$teacher->teacher_name}}   </p>
        <p>teacher id: {{$teacher->teacher_id}}   </p>
        <p>teacher Department:{{$teacher->dept_name}}  </p>
        

      </div>
    </div>
  </div>
</div>

@endsection