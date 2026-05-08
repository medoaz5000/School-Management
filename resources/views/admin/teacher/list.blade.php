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
                <h3 class="mb-0">Teacher List <small class="h6">(Tolal : {{ $getRecord->total()}})</small ></h3>
              </div>
              <div class="col-sm-6" style="text-align:right;">
                <a href='{{ url('admin/parent/add') }}' class="btn btn-primary">Add New Parent</a>
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
                    <h3 class="card-title">Search Teacher</h3>
                  </div>
                  <form action="" method="get">
                    <!--begin::Different Width-->
                    <!--begin::Body-->
                    <div class="card-body">
                      <!--begin::Row-->
                      <div class="row">
                          <!--begin::Col-->
                          <div class="col-3">
                            <input type="text" name="name" value="{{ Request::get('name'), Request::get('last_name') }}" class="form-control" placeholder="name teacher" />
                          </div>
                          <!--end::Col-->

                          <!--begin::Col-->
                          <div class="col-3">
                            <input type="text" name="email" value="{{ Request::get('email')}}" class="form-control" placeholder="email" />
                          </div> 
                          <!--end::Col-->

                          

                          <!--begin::Col-->
                          <div class="col-3">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            <a href="{{ url('admin/parent/list') }}" class="btn btn-success btn-sm">Clear</a>
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

                <div class="card card-danger card-outline mb-4 overflow-auto">
                  <div class="card-header">
                    <h3 class="card-title">Teacher List </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0 overflow-auto">
                    
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Names</th>
                          <th>Email</th>
                          <th>Gender</th>
                          <th>Phone</th>
                          <th>Occupation</th>
                          <th>Adresse</th>
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
                              <td>{{ $item->gender}}</td>
                              <td>{{ $item->mobile_number}}</td>
                              <td>{{ $item->occupation}}</td>
                              <td>{{ $item->adresse}}</td>
                              <td>
                                @if($item->status == 0)
                                    <span class="bg-warning text-black p-1 rounded-pill ">Active</span>
                                @else
                                    <span class="bg-secondary text-white p-1 rounded-pill text-sm">Inactive</span>
                                @endif
                              </td>
                              <td>{{ $item->created_at->format('Y-m-d')}}</td>
                              <td>
                                <a href="{{ url('admin/parent/edit/'.$item->id )}}" class="btn btn-primary btn-sm bi bi-pencil-square"></a>
                                <a href="{{ url('admin/parent/delete/'.$item->id )}}" class="btn btn-danger btn-sm bi bi-trash3"></a>
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


