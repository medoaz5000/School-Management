@extends('layouts.app')
@section('content')
{{-- NEW: teacher/my_student: students dyal classes dyal teacher --}}
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">My Students <small class="h6">(Total : {{ count($students) }})</small></h3>
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      @include('flash-message')
      <div class="card card-primary card-outline mb-4">
        <div class="card-header"><h3 class="card-title">Students List</h3></div>
        <div class="card-body p-0 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th><th>Name</th><th>Email</th><th>Class</th><th>Gender</th><th>Mobile</th><th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse($students as $student)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $student->name }} {{ $student->last_name }}</td>
                  <td>{{ $student->email }}</td>
                  <td>{{ $student->class_name }}</td>
                  <td>{{ $student->gender ?: '-' }}</td>
                  <td>{{ $student->mobile_number ?: '-' }}</td>
                  <td>
                    @if($student->status == 0)
                      <span class="badge text-bg-success">Active</span>
                    @else
                      <span class="badge text-bg-secondary">Inactive</span>
                    @endif
                  </td>
                </tr>
              @empty
                <tr><td colspan="7" class="text-center text-secondary">No students found.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
