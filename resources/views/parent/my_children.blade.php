@extends('layouts.app')
@section('content')
{{-- NEW: parent/my_children: liste dyal l'enfants --}}
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">My Children <small class="h6">(Total : {{ count($children) }})</small></h3>
        </div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      @include('flash-message')
      <div class="card card-primary card-outline mb-4">
        <div class="card-header"><h3 class="card-title">Children List</h3></div>
        <div class="card-body p-0 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr><th>#</th><th>Name</th><th>Email</th><th>Class</th><th>Gender</th><th>Status</th><th>Action</th></tr>
            </thead>
            <tbody>
              @forelse($children as $child)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $child->name }} {{ $child->last_name }}</td>
                  <td>{{ $child->email }}</td>
                  <td>{{ $child->class_name ?: '-' }}</td>
                  <td>{{ $child->gender ?: '-' }}</td>
                  <td>
                    @if($child->status == 0)
                      <span class="badge text-bg-success">Active</span>
                    @else
                      <span class="badge text-bg-secondary">Inactive</span>
                    @endif
                  </td>
                  <td><a href="{{ url('parent/child/'.$child->id) }}" class="btn btn-sm btn-primary">View</a></td>
                </tr>
              @empty
                <tr><td colspan="7" class="text-center text-secondary">No children linked to your account yet.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
