@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('add.book')}}" class="btn btn-danger">Add Books</a>
      <hr>
      <table class="table table-resonsive">
        <tr>
          <th>Books Name </th>
          <th>Books image</th>
          <th>Books details</th>
          <th>Action </th>
        </tr>
       @foreach($book as $books)
       <tr>
         <td>{{ $books->book_name }}</td>
         <td> <img src="{{ URL::to($books->book_image) }}" style="height:70px; width:40px"></td>
         <td>{{ $books->book_details }}</td>
         <td>
           <a href="{{ url('edit/books/'.$books->id) }}" class="btn btn-info">Edit</a>
           <a href="{{ url('delete/books/'.$books->id) }}" class="btn btn-danger">Delete</a>
         </td>
       </tr>
       @endforeach

       </table>
    </div>
  </div>
</div>
@endsection