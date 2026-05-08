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
            <h3 class="mb-0">Edit Admin</h3>
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
                  <form method="POST" action="">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          name="name"
                          value="{{ $getRecord->name}}"
                          required
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
                          value="{{ $getRecord->email}}"
                          required
                        />
                      <span style='color: red'>{{ $errors->first('email')}}</span>
                      </div>

                      <div class="mb-3 col-md-6">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" id="exampleInputPassword1" />
                        <p id="emailHelp" class="form-text">Do you want to change password so please add new password </p>
                      </div>
                      
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
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

