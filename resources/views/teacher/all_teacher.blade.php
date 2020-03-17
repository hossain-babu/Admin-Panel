@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.teacher')}}" class="btn btn-danger">Add teachers</a>
      <hr>
      <table class="table table-resonsive">
        <tr>
          <th>Teacher Name </th>
          <th>Teacher Id</th>
          <th>Teacher dept</th>
          <th>Teacher Image</th>
          <th>Action </th>
        </tr>
       @foreach($teacher as $teacher)
       <tr>
         <td>{{ $teacher->teacher_name }}</td>
         <td>{{ $teacher->teacher_id }}</td>
         <td>{{ $teacher->dept_name }}</td>
         <td> <img src="{{ URL::to($teacher->teacher_image) }}" style="height:70px; width:40px"></td>
         <td>
           <a href="{{ url('edit/teacher/'.$teacher->id) }}" class="btn btn-info">Edit</a>
           <a href="{{ url('delete/teacher/'.$teacher->id)  }}" class="btn btn-danger">Delete</a>
           <a href="{{ url('view/teacher/'.$teacher->id) }}" class="btn btn-danger">View</a>
         </td>
       </tr>
       @endforeach

       </table>
    </div>
  </div>
</div>
@endsection