@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href=" {{ route('all.books') }}" class="btn btn-success">All books</a>
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ url('update/books/'.$book->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Book Title</label>
              <input type="text" class="form-control" value="{{ $book->book_name }}" placeholder="Book Title" name="book_name" id="name"> 
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Book ID </label>
              <input type="text" class="form-control" value="{{ $book->book_id }}" placeholder="Book id" name="book_id" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>New Image</label>
              <input type="file" class="form-control" placeholder="Enter Image" name="book_image">
             Old Image: <img src="{{ url(URL::to($book->book_image)) }}" style="height: 70px ;width:40px">
             <input type="hidden" name="old_photo" value="{{ $book->book_image }}">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Book Details</label>
              <textarea rows="5" class="form-control" placeholder="details" name="book_details">{{ $book->book_details }} </textarea>
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