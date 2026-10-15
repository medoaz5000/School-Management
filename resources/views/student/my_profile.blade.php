@extends('layouts.app')
@section('content')
{{-- NEW: student/my_profile: ma3loumat dyal student (read-only) --}}
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">My Profile</h3></div>
      </div>
    </div>
  </div>
  <div class="app-content">
    <div class="container-fluid">
      @include('flash-message')
      <div class="card card-primary card-outline mb-4">
        <div class="card-body">
          <dl class="row mb-0">
            <dt class="col-sm-3">Name</dt><dd class="col-sm-9">{{ $me->name }} {{ $me->last_name }}</dd>
            <dt class="col-sm-3">Email</dt><dd class="col-sm-9">{{ $me->email }}</dd>
            <dt class="col-sm-3">Class</dt><dd class="col-sm-9">{{ $class->name ?? '-' }}</dd>
            <dt class="col-sm-3">Admission number</dt><dd class="col-sm-9">{{ $me->admission_number ?: '-' }}</dd>
            <dt class="col-sm-3">Roll number</dt><dd class="col-sm-9">{{ $me->roll_number ?: '-' }}</dd>
            <dt class="col-sm-3">Gender</dt><dd class="col-sm-9">{{ $me->gender ?: '-' }}</dd>
            <dt class="col-sm-3">Date of birth</dt><dd class="col-sm-9">{{ $me->date_of_birth ?: '-' }}</dd>
            <dt class="col-sm-3">Admission date</dt><dd class="col-sm-9">{{ $me->admission_date ?: '-' }}</dd>
            <dt class="col-sm-3">Mobile</dt><dd class="col-sm-9">{{ $me->mobile_number ?: '-' }}</dd>
            <dt class="col-sm-3">Blood group</dt><dd class="col-sm-9">{{ $me->blood_group ?: '-' }}</dd>
            <dt class="col-sm-3">Height / Weight</dt><dd class="col-sm-9">{{ $me->height ?: '-' }} / {{ $me->weight ?: '-' }}</dd>
            <dt class="col-sm-3">Parent</dt>
            <dd class="col-sm-9">{{ $parent ? $parent->name.' '.$parent->last_name : '-' }}</dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
