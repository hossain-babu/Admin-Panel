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
        <form action="{{ route('store.book') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Book Title</label>
              <input type="text" class="form-control" placeholder="Book Title" name="book_name" id="name" required> 
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Book ID </label>
              <input type="text" class="form-control" placeholder="Book id" name="book_id" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Book Image</label>
              <input type="file" class="form-control" placeholder="Enter Image" id="phone" name="book_image">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Book Details</label>
              <textarea rows="5" class="form-control" placeholder="details" name="book_details"></textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection