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
            <h3 class="mb-0">Edit Parent</h3>
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
                  <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                            @if(!empty($getRecord->getProfile()))
                                <center><img src="{{ $getRecord->getProfile() }}" class="img-thumbnail mb-5" width='140' height='140' alt="Photo Profile"></center>
                            @endif
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">First Name<span style="color: red">*</span></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{ $getRecord->name }}"
                                    required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Last Name<span style="color: red">*</span></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="last_name"
                                    value="{{ $getRecord->last_name }}"
                                    placeholder="Last Name"
                                    required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label ">Gender<span style="color: red">*</span></label>
                                <select class="form-control" name="gender" id="" required >
                                    <option {{ ($getRecord->gender == 0) ? 'selected' : ''}} class="form-control" value="Male">Male</option>
                                    <option {{ ($getRecord->gender == 1) ? 'selected' : ''}} class="form-control" value="Female">Female</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Occupation<span style="color: red">*</span></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="occupation"
                                    value="{{ $getRecord->occupation }}"
                                    placeholder="Occupation"
                                    required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Adresse<span style="color: red">*</span></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="adresse"
                                    value="{{ $getRecord->adresse }}"
                                    placeholder="Adresse"
                                    required
                                />
                            </div>

                           

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Mobile Number<span style="color: red">*</span></label>
                                <input
                                type="text"
                                class="form-control"
                                name="mobile_number"
                                value="{{ $getRecord->mobile_number }}"
                                placeholder="Mobile Number"
                                required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label ">Status<span style="color: red">*</span></label>
                                <select class="form-control" name="status" id="" required>
                                    <option {{ ($getRecord->status == 0) ? 'selected' : ''}} class="form-control" value="0">Active</option>
                                    <option {{ ($getRecord->status == 1) ? 'selected' : ''}} class="form-control" value="1">Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Photo</label>
                                <input
                                type="file"
                                class="form-control"
                                name="image"
                                />
                            </div>

                        </div>

                        <hr />

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Email address<span style="color: red">*</span></label>
                                <input
                                type="email"
                                class="form-control"
                                id="exampleInputEmail1"
                                name="email"
                                aria-describedby="emailHelp"
                                value="{{ $getRecord->email }}"
                                disabled
                                />
                            </div>

                           
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

