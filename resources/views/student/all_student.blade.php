@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('student.add')}}" class="btn btn-danger">Add Students</a>
      <hr>
      <table class="table table-resonsive">
        <tr>
          <th>Student Name </th>
          <th>Student Id</th>
          <th>Student dept</th>
          <th>Student Image</th>
          <th>Action </th>
        </tr>
       @foreach($student as $student)
       <tr>
         <td>{{ $student->student_name }}</td>
         <td>{{ $student->stu_id }}</td>
         <td>{{ $student->dept_name }}</td>
         <td> <img src="{{ URL::to($student->stu_image) }}" style="height:70px; width:40px"></td>
         <td>
           <a href="{{ url('edit/student/'.$student->id) }}" class="btn btn-info">Edit</a>
           <a href="{{ url('delete/student/'.$student->id)  }}" class="btn btn-danger">Delete</a>
           <a href="{{ url('view/student/'.$student->id) }}" class="btn btn-danger">View</a>
         </td>
       </tr>
       @endforeach

       </table>
    </div>
  </div>
</div>
@endsection