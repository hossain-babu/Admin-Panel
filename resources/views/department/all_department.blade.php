@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.dept')}}" class="btn btn-danger">Add Department</a>
      <hr>
      <table class="table table-resonsive">
        <tr>
          <th>Department Name </th>
          <th>Department ID</th>
          <th>Action </th>
        </tr>
        @foreach($department as $dept)
       <tr>
         <td>{{ $dept->dept_name }}</td>
         <td>{{ $dept->dept_id }}</td>
         <td>
           <a href="{{ url('edit/department/'.$dept->id) }}" class="btn btn-info">Edit</a>
           <a href="{{ url('delete/department/'.$dept->id) }}" class="btn btn-danger">Delete</a>
         </td>
       </tr>
       @endforeach

       </table>
    </div>
  </div>
</div>
@endsection