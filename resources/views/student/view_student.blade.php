@extends('welcome')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <a href="{{route('student.add')}}" class="btn btn-danger">Add Students</a>
    <a href="{{route('all.students')}}" class="btn btn-danger">All Students</a>
      <div>
        <p>Student Name: {{$student->student_name}} </p>
        <p>Student id: {{$student->stu_id}} </p>
        <p>Student Password: {{$student->stu_pass}} </p>
        <p>Student Department: {{$student->dept_name}} </p>
        <p>Student Phone: {{$student->stu_phn}} </p>
        <img src="{{ url($student->stu_image) }}" style="height: 200px; width:auto">
        <p>Father name: {{$student->father_name}} </p>
        <p>Mother Name: {{$student->mother_name}} </p>
        <p>Present Address: {{$student->student_address}} </p>

      </div>
    </div>
  </div>
</div>

@endsection