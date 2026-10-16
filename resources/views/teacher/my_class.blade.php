@extends('layouts.app')
@section('content')
{{-- NEW: teacher/my_class: classes dyal teacher + subjects dyal kol classe --}}
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">My Classes <small class="h6">(Total : {{ count($classes) }})</small></h3>
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      @include('flash-message')
      <div class="row">
        @forelse($classes as $class)
          <div class="col-md-6">
            <div class="card card-primary card-outline mb-4">
              <div class="card-header">
                <h3 class="card-title">{{ $class->name }}</h3>
                <div class="card-tools">
                  <span class="badge text-bg-primary">{{ $studentCounts[$class->id] ?? 0 }} students</span>
                </div>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped mb-0">
                  <thead>
                    <tr><th>#</th><th>Subject</th><th>Type</th></tr>
                  </thead>
                  <tbody>
                    @forelse(($subjects[$class->id] ?? collect()) as $subject)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>{{ $subject->type }}</td>
                      </tr>
                    @empty
                      <tr><td colspan="3" class="text-center text-secondary">No active subjects for this class yet.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12">
            <div class="alert alert-info">No class assigned to you yet.</div>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</main>
@endsection
