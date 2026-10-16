@extends('layouts.app')
@section('content')
{{-- NEW: parent/child/{id}: details dyal wlid (classe, subjects, teachers) --}}
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-8">
          <h3 class="mb-0">{{ $child->name }} {{ $child->last_name }} <small class="h6">({{ $class->name ?? '-' }})</small></h3>
        </div>
        <div class="col-sm-4" style="text-align:right;">
          <a href="{{ url('parent/my_children') }}" class="btn btn-secondary">Back</a>
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      @include('flash-message')
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary card-outline mb-4">
            <div class="card-header"><h3 class="card-title">Information</h3></div>
            <div class="card-body">
              <dl class="row mb-0">
                <dt class="col-sm-5">Email</dt><dd class="col-sm-7">{{ $child->email }}</dd>
                <dt class="col-sm-5">Admission number</dt><dd class="col-sm-7">{{ $child->admission_number ?: '-' }}</dd>
                <dt class="col-sm-5">Roll number</dt><dd class="col-sm-7">{{ $child->roll_number ?: '-' }}</dd>
                <dt class="col-sm-5">Gender</dt><dd class="col-sm-7">{{ $child->gender ?: '-' }}</dd>
                <dt class="col-sm-5">Date of birth</dt><dd class="col-sm-7">{{ $child->date_of_birth ?: '-' }}</dd>
                <dt class="col-sm-5">Admission date</dt><dd class="col-sm-7">{{ $child->admission_date ?: '-' }}</dd>
              </dl>
            </div>
          </div>
          <div class="card card-success card-outline mb-4">
            <div class="card-header"><h3 class="card-title">Teachers</h3></div>
            <div class="card-body p-0">
              <table class="table table-striped mb-0">
                <tbody>
                  @forelse($teachers as $teacher)
                    <tr><td>{{ $teacher->name }} {{ $teacher->last_name }}</td><td>{{ $teacher->email }}</td></tr>
                  @empty
                    <tr><td class="text-center text-secondary">No teacher assigned yet.</td></tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-warning card-outline mb-4">
            <div class="card-header"><h3 class="card-title">Subjects</h3></div>
            <div class="card-body p-0">
              <table class="table table-striped mb-0">
                <thead><tr><th>#</th><th>Subject</th><th>Type</th></tr></thead>
                <tbody>
                  @forelse($subjects as $subject)
                    <tr><td>{{ $loop->iteration }}</td><td>{{ $subject->name }}</td><td>{{ $subject->type }}</td></tr>
                  @empty
                    <tr><td colspan="3" class="text-center text-secondary">No active subjects yet.</td></tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
