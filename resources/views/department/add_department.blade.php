@extends('welcome')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <a href="{{route('all.dept')}}" class="btn btn-danger">All Department</a>
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
      <form action="{{ route('store.dept') }}" method="post">
        @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" name="dept_name">
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>department ID</label>
            <input type="text" class="form-control" placeholder="Department Id" name="dept_id" >
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