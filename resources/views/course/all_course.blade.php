@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.course')}}" class="btn btn-danger">Add Course</a>
      <hr>
      <table class="table table-resonsive">
        <tr>
          <th>Course Name </th>
          <th>Course ID</th>
          <th>Action </th>
        </tr>
        @foreach($course as $course)
       <tr>
         <td>{{ $course->course_name }}</td>
         <td>{{ $course->course_id }}</td>
         <td>
           <a href="{{ url('edit/course/'.$course->id) }}" class="btn btn-info">Edit</a>
           <a href="{{ url('delete/course/'.$course->id) }}" class="btn btn-danger">Delete</a>
         </td>
       </tr>
       @endforeach

       </table>
    </div>
  </div>
</div>
@endsection