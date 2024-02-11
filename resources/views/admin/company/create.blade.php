@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Company</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Create Company</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->
    <div class="row">
      <div class="col-md">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Form</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                      <label for="exampleInputName">Name*</label>
                      <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Name" name="name">
                  </div>
          
                  <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                  </div>
          
                  <div class="form-group ">
                      <label for="logo">Upload File</label>
                      <span class="input-group-addon">
                          <input type="file" name="logo" class="form-control" placeholder="Choose File">
                      </span>
                  </div>
          
                  <div class="form-group">
                      <label for="exampleInputWebsite">Website</label>
                      <input type="text" class="form-control" id="exampleInputWebsite" placeholder="Enter website" name="website">
                  </div>
              </div>
          
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
          
          
          </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row (main row) -->
@endsection