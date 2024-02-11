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
          <li class="breadcrumb-item active">Company</li>
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
            <h3 class="card-title">List</h3>
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th style="width: 10px">Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($companies as $company)
              <tr>
                <td>
                  @if ($company->logo)
                      @php
                          $imagePath = storage_path('app/public/' . $company->logo);
                          list($width, $height) = getimagesize($imagePath);
                      @endphp
              
                      @if ($width >= 100 && $height >= 100)
                      <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" style="max-width: 100px; max-height: 100px; border-radius: 50%;">
                      @else
                          <p>Logo too small (minimum 100x100)</p>
                      @endif
                  @else
                      No Logo
                  @endif
              </td>
              
                <td>{{$company->name}}</td>
                  <td>{{$company->email}}</td>
                  <td>{{$company->website}}</td>
                  <td>
                    <a href="{{ route('companies.edit', ['company' => $company->id]) }}" class="btn btn-primary">Edit</a>
                
                    <form action="{{ route('companies.destroy', ['company' => $company->id]) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                
              </tr>
              @endforeach
          </tbody>
            </table>
          </div>
          {!! $companies->links() !!}
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row (main row) -->
@endsection