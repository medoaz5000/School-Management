@extends('layouts.app')
@section('content')
{{-- NEW: student/my_class: classe + subjects + teachers + classmates --}}
<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">My Class: </h3>
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
            <div class="card-header"><h3 class="card-title">Subjects</h3></div>
            <div class="card-body p-0">
              <table class="table table-striped mb-0">
                <thead><tr><th>#</th><th>Subject</th><th>Type</th></tr></thead>
                <tbody>
                  
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  
                    <tr><td colspan="3" class="text-center text-secondary">No active subjects yet.</td></tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-success card-outline mb-4">
            <div class="card-header"><h3 class="card-title">Teachers</h3></div>
            <div class="card-body p-0">
              <table class="table table-striped mb-0">
                <thead><tr><th>#</th><th>Name</th><th>Email</th></tr></thead>
                <tbody>
                  
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  
                    <tr><td colspan="3" class="text-center text-secondary">No teacher assigned yet.</td></tr>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card card-warning card-outline mb-4">
            <div class="card-header"><h3 class="card-title">Classmates </h3></div>
            <div class="card-body p-0">
              <table class="table table-striped mb-0">
                <tbody>
                  
                    <tr><td></td><td></td></tr>
                  
                    <tr><td class="text-center text-secondary">No classmates yet.</td></tr>
                  
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
