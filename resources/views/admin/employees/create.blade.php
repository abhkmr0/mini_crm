@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Employee</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Add Employee</li>
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
            <h3 class="card-title">Add Employee Form</h3>
           
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" action="{{ route('employees.store') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputFirstName">First Name*</label>
                        <input type="text" name="first_name" class="form-control" id="exampleInputFirstName" placeholder="Enter First Name">
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                    </div>
            
                    <div class="form-group">
                        <label for="exampleInputLastName">Last Name*</label>
                        <input type="text" name="last_name" class="form-control" id="exampleInputLastName" placeholder="Enter Last Name">
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                    </div>
            
                    <div class="form-group">
                        <label for="company_id">Company*</label>
                        <select class="form-control" id="company_id" name="company_id">
                            <option value="" disabled selected>Select a Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('company_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                    </div>
            
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            
                <!-- /.card-body -->
            
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