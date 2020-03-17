@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{ route('all.teacher') }}" class="btn btn-success">All teacher</a>
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ route('insert.teacher') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Teacher Name</label>
              <input type="text" class="form-control" placeholder="Teacher Name" name="teacher_name" id="name" required> 
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label> Teacher id </label>
              <input type="text" class="form-control" placeholder="teacher ID" name="teacher_id" id="name" required> 
            </div>
          </div>
          <br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>teacher Image</label>
              <input type="file" class="form-control" placeholder="Enter Image" id="phone" name="teacher_image">
            </div>
          </div>
          <br>
 
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Teacher Dept</label>
              <Select class="form-control" name="teacher_dept">
              <option>Choose</option>  
             @foreach($dept as $dept)
                <option value="{{ $dept->dept_id  }}">{{  $dept->dept_name }}</option>
            @endforeach
              </Select>

            </div>
          </div>
          <br>


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