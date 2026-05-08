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
            <h3 class="mb-0">Add New Subject</h3>
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
                  <form method="POST" action="{{ route('subject.add.post') }}">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3 col-md-6">
                        <label class="form-label">Subject Name</label>
                        <input
                          type="text"
                          class="form-control"
                          name="name"
                          value="{{ old('name') }}"
                          placeholder="subject name"
                          required
                        />
                      </div>

                      <div class="mb-3 col-md-6">
                        <label class="form-label ">Type Subject</label>
                            <select class="form-control" name="type" id="">
                                <option class="form-control" value="0">Select Type</option>
                                <option class="form-control" value="Theory">Theory</option>
                                <option class="form-control" value="Partical">Partical</option>
                            </select>
                      </div>


                      <div class="mb-3 col-md-6">
                        <label class="form-label ">Status</label>
                            <select class="form-control" name="status" id="">
                                <option class="form-control" value="0">Select Status</option>
                                <option class="form-control" value="0">Active</option>
                                <option class="form-control" value="1">Inactive</option>
                            </select>
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

