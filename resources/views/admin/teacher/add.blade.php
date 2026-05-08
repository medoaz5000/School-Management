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
            <h3 class="mb-0">Add New Teacher</h3>
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
        @include('flash-message')
        <!--begin::Row-->
        <div class="row g-4">
            
            <!--begin::Col-->
            <div class="col-md-12">
          
                  <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                   
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form method="POST" action="{{route('parent.add.post')}}" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">First Name<span style="color: red">*</span></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="First Name"
                                    required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Last Name<span style="color: red">*</span></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="last_name"
                                    value="{{ old('last_name') }}"
                                    placeholder="Last Name"
                                    required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label ">Gender<span style="color: red">*</span></label>
                                <select class="form-control" name="gender" id="" required>
                                    <option class="form-control" value="">Select Gender</option>
                                    <option class="form-control" value="Male">Male</option>
                                    <option class="form-control" value="Female">Female</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Occupation<span style="color: red">*</span></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="occupation"
                                    value="{{ old('occupation') }}"
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
                                    value="{{ old('adresse') }}"
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
                                value="{{ old('mobile_number') }}"
                                placeholder="Mobile Number"
                                required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label ">Status<span style="color: red">*</span></label>
                                <select class="form-control" name="status" id="" required>
                                    <option class="form-control" value="">Select Status</option>
                                    <option class="form-control" value="0">Active</option>
                                    <option class="form-control" value="1">Inactive</option>
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
                                <label class="form-label">Email address<span style="color:red">*</span></label>
                                <input
                                type="email"
                                class="form-control"
                                id="exampleInputEmail1"
                                name="email"
                                aria-describedby="emailHelp"
                                value="{{ old('email') }}"
                                required
                                />
                                <span style='color: red'>{{ $errors->first('email')}}</span>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Password<span style="color:red">*</span></label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" required/>
                            </div>
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

