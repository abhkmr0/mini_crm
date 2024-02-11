@extends('admin.main-layout')

@section('content-header')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Employees</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Employees</li>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Company</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
              <tr>
                  <td>{{$employee->first_name}}</td>
                  <td>{{$employee->last_name}}</td>
                  <td>{{$employee->phone}}</td>
                  <td>{{$employee->email}}</td>
                  <td>{{$employee->company->name}}</td>
                  <td>
                    <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}" class="btn btn-primary">Edit</a>
                    
                    <form action="{{ route('employees.destroy', ['employee' => $employee->id]) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
          </tbody>
            </table>
          </div>

          {!! $employees->links() !!}
          <!-- /.card-body -->
          
        </div>
        <!-- /.card -->
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row (main row) -->
    <script>
      function confirmDelete() {
          if (confirm("Are you sure you want to delete this employee?")) {
              // If the user clicks "OK", submit the form
              document.forms[0].submit();
          } else {
              // If the user clicks "Cancel", do nothing
          }
      }
  </script>
@endsection