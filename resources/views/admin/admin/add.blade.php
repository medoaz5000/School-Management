@extends('layouts.app')

@section('content')

    <!--begin::App Main-->
    <main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
            <h3 class="mb-0">Add New Admin</h3>
            </div>
            <div class="col-sm-6">
            
            </div>
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row g-4">
            
            <!--begin::Col-->
            <div class="col-md-12">
          
                  <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                   
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form method="POST" action="{{ route('admin.add.post') }}">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          name="name"
                          value="{{ old('name') }}"
                        />
                      </div>

                      <div class="mb-3 col-md-6">
                        <label class="form-label">Email address</label>
                        <input
                          type="email"
                          class="form-control"
                          id="exampleInputEmail1"
                          name="email"
                          aria-describedby="emailHelp"
                          value="{{ old('email') }}"
                        />
                        <span style='color: red'>{{ $errors->first('email')}}</span>
                      </div>

                      <div class="mb-3 col-md-6">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" />
                      </div>
                      
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
                <!--end::Quick Example-->

              
 
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
    </main>
    <!--end::App Main-->
@endsection

