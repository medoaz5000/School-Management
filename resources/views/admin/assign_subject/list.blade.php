@extends('layouts.app')

@section('content')

      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Assign Subject List <small class="h6"> (Tolal : {{ $getRecord->total()}} ) </small ></h3>
              </div>
              <div class="col-sm-6" style="text-align:right;">
                <a href='{{ url('admin/assign_subject/add') }}' class="btn btn-primary">Add New Assign Subject</a>
              </div>
              
            </div>
            <!--end::Row-->
            
          </div>
          <!--end::Container-->
          
        </div>
        <!--end::App Content Header-->


        <div class="app-content">
          <div class="container-fluid">
            <div class="card-danger card-outline ">
              <!-- /.card -->
                <div class="card mb-4">
                  <div class="card-header">
                    <h3 class="card-title">Search Assign Subject</h3>
                  </div>
                  <form action="" method="get">
                    <!--begin::Different Width-->
                    <!--begin::Body-->
                    <div class="card-body">
                      <!--begin::Row-->
                      <div class="row">
                          <!--begin::Col-->
                          <div class="col-4">
                            <input type="text" name="name" value="{{ Request::get('class_name')}}" class="form-control" placeholder="class name" />
                          </div>
                          <!--end::Col-->

                          <!--begin::Col-->
                          <div class="col-4">
                            <input type="text" name="subject_name" value="{{ Request::get('subject_name')}}" class="form-control" placeholder="subject name" />
                          </div>
                          <!--end::Col-->

                          <!--begin::Col-->
                          <div class="col-4">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="{{ url('admin/assign_subject/list') }}" class="btn btn-success">Clear</a>
                          </div>
                          <!--end::Col-->
                          
                      </div>
                      <!--end::Row-->
                    </div>
                    <!--end::Body-->
                    <!--end::Different Width-->
                </form>
                </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
        
        
        @include('flash-message')
          

        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-6">
                
              </div>
              
                </div>
                <!-- /.card -->

                <div class="card card-danger card-outline mb-4">
                  <div class="card-header">
                    <h3 class="card-title">Assign Subject List </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Class Name</th>
                          <th>Subject Name</th>
                          <th>Status</th>
                          <th>Created_by</th>
                          <th>Created Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($getRecord as $value)
                          <tr>
                            <td>{{ $value->id}}</td>
                            <td>{{ $value->class_name}}</td>
                            <td>{{ $value->subject_name}}</td>
                            <td>
                              @if($value->status == 0)
                                  <span class="bg-warning text-black p-1 rounded-pill "><small>Active</small></span>
                              @else
                                  <span class="bg-secondary text-white p-1 rounded-pill text-sm"><small>Inactive</small></span>
                              @endif
                            </td>
                            <td>{{ $value->created_by_name}}</td>
                            <td>{{ $value->created_at}}</td>
                            <td>
                              <a href="{{ url('admin/assign_subject/edit/'.$value->id )}}" class="btn btn-primary btn-sm bi bi-pencil-square"></a>
                              <a href="{{ url('admin/assign_subject/edit_single/'.$value->id )}}" class="btn btn-primary btn-sm bi bi-pencil"></a>
                              <a href="{{ url('admin/assign_subject/delete/'.$value->id )}}" class="btn btn-danger btn-sm bi bi-trash3"></a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div style="padding: 10px; float: right;">
                      {!! $getRecord->appends(Request::except('page'))->links() !!}
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
@endsection


