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
            <h3 class="mb-0">Change Password</h3>
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
                @include('flash-message')
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
                        <label class="form-label">Current password</label>
                        <input
                          type="password"
                          class="form-control"
                          name="old_password"
                          value=""
                          placeholder="old password"
                        />
                      </div>

                      <div class="mb-3 col-md-6">
                        <label class="form-label">New Password</label>
                        <input
                          type="password"
                          class="form-control"
                          name="new_password"
                          value=""
                          placeholder="new password"
                        />
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

