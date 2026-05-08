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
                <h3 class="mb-0">Student List <small class="h6">(Tolal : {{ $getRecord->total()}})</small ></h3>
              </div>
              <div class="col-sm-6" style="text-align:right;">
                <a href='{{ url('admin/student/add') }}' class="btn btn-primary">Add New Student</a>
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
                    <h3 class="card-title">Search Student</h3>
                  </div>
                  <form action="" method="get">
                    <!--begin::Different Width-->
                    <!--begin::Body-->
                    <div class="card-body">
                      <!--begin::Row-->
                      <div class="row">
                          <!--begin::Col-->
                          <div class="col-3">
                            <input type="text" name="name" value="{{ Request::get('name'), Request::get('last_name') }}" class="form-control" placeholder="name student" />
                          </div>
                          <!--end::Col-->

                          <!--begin::Col-->
                          <div class="col-3">
                            <input type="text" name="email" value="{{ Request::get('email')}}" class="form-control" placeholder="email" />
                          </div> 
                          <!--end::Col-->

                          <!--begin::Col-->
                          <div class="col-3">
                            <!--<input type="text" name="class" value="{{ Request::get('class_id')}}" class="form-control" placeholder="Class Name" />-->
                            <select class="form-control" name="class" id="" value="">
                              <option class="form-control" value="">Class</option>
                              @foreach ($getClass as $class)
                                  <option class="form-control" value="{{ $class->id }}">{{ $class->name}}</option>
                              @endforeach
                            </select>
                          </div> 
                          <!--end::Col-->

                          <!--begin::Col-->
                          <div class="col-3">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            <a href="{{ url('admin/student/list') }}" class="btn btn-success btn-sm">Clear</a>
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
              <div class="col-md-12">
                
              </div>
              
                </div>
                <!-- /.card -->

                <div class="card card-danger card-outline mb-4 col-md-12">
                  <div class="card-header col-md-12">
                    <h3 class="card-title">Student List </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0 overflow-auto">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Names</th>
                          <th>Email</th>
                          <th>Admission Number</th>
                          <th>Roll Number</th>
                          <th>Class</th>
                          <th>Gender</th>
                          <th>Date of Birth</th>
                          <th>Caste</th>
                          <th>Religion</th>
                          <th>Mobile Number</th>
                          <th>Admission Date</th>
                          <th>Status</th>
                          <th>Created Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($getRecord as $item)
                            <tr>
                              <td>{{ $item->id}}</td>
                              <td>{{ $item->name}} {{$item->last_name}}</td>
                              <td>{{ $item->email}}</td>
                              <td>{{ $item->admission_number}}</td>
                              <td>{{ $item->roll_number}}</td>
                              <td>{{ $item->class_by_name}}</td>
                              <td>{{ $item->gender}}</td>
                              <td>{{ $item->date_of_birth}}</td>
                              <td>{{ $item->caste}}</td>
                              <td>{{ $item->religion}}</td>
                              <td>{{ $item->mobile_number}}</td>
                              <td>{{ $item->admission_date}}</td>
                              <td>
                                @if($item->status == 0)
                                    <span class="bg-warning text-black p-1 rounded-pill ">Active</span>
                                @else
                                    <span class="bg-secondary text-white p-1 rounded-pill text-sm">Inactive</span>
                                @endif
                              </td>
                              </td>
                              <td>{{ $item->created_at->format('Y-m-d')}}</td>
                              <td>
                                <a href="{{ url('admin/student/edit/'.$item->id )}}" class="btn btn-primary btn-sm bi bi-pencil-square"></a>
                                <a href="{{ url('admin/student/delete/'.$item->id )}}" class="btn btn-danger btn-sm bi bi-trash3"></a>
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


