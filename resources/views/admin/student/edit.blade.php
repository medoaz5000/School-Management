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
            <h3 class="mb-0">Edit Student</h3>
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
                <div class="card card-primary  card-outline mb-4">
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
                                    value="{{ $getRecord->last_name }}"
                                    placeholder="Last Name"
                                    required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Admission Number<span style="color: red">*</span></label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="admission_number"
                                    value="{{ $getRecord->admission_number }}"
                                    placeholder="Admission Number"
                                    required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Roll Number</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="roll_number"
                                    value="{{ $getRecord->roll_number }}"
                                    placeholder="Roll Number"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label ">Class<span style="color: red">*</span></label>
                                <select class="form-control" name="class_id" id="" required>
                                    @foreach ($getClass as $class)
                                    <option {{ ($getRecord->class_id == $class->id) ? 'selected' : ''}} class="form-control" value="{{ $class->id }}">{{ $class->name }}</option>    
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label ">Gender<span style="color: red">*</span></label>
                                <select class="form-control" name="gender" id="" disabled required>
                                    <option {{ ($getRecord->gender == 0) ? 'selected' : ''}} class="form-control" value="0">Male</option>
                                    <option {{ ($getRecord->gender == 1) ? 'selected' : ''}} class="form-control" value="1">Female</option>
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Date of Birth<span style="color: red">*</span></label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="date_of_birth"
                                    value="{{ $getRecord->date_of_birth }}"
                                    placeholder="Date of Birth"
                                    required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Caste</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="caste"
                                    value="{{ $getRecord->caste }}"
                                    placeholder="Caste"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Religion</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="religion"
                                    value="{{ $getRecord->religion }}"
                                    placeholder="Religion"
                                />
                            </div>

                           

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Mobile Number</label>
                                <input
                                type="text"
                                class="form-control"
                                name="mobile_number"
                                value="{{ $getRecord->mobile_number }}"
                                placeholder="Mobile Number"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Date Admission<span style="color: red">*</span></label>
                                <input
                                    type="date"
                                    class="form-control"
                                    name="admission_date"
                                    value="{{ $getRecord->admission_date }}"
                                    placeholder="Date Admission"
                                    required
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Photo</label>
                                <input
                                type="file"
                                class="form-control"
                                name="image"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Blood Group</label>
                                <input
                                type="text"
                                class="form-control"
                                name="blood_group"
                                value="{{ $getRecord->blood_group }}"
                                placeholder="Blood Group"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Height</label>
                                <input
                                type="text"
                                class="form-control"
                                name="height"
                                value="{{ $getRecord->height }}"
                                placeholder="Height"                           
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Weight</label>
                                <input
                                type="text"
                                class="form-control"
                                name="weight"
                                value="{{  $getRecord->weight }}"
                                placeholder="Weight"
                                />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label ">Status<span style="color: red">*</span></label>
                                <select class="form-control" name="status" id="" required>
                                    <option {{ ($getRecord->status == 0) ? 'selected' : ''}} class="form-control" value="0">Active</option>
                                    <option {{ ($getRecord->status == 1) ? 'selected' : ''}} class="form-control" value="1">Inactive</option>
                                </select>
                            </div>

                        </div>

                         <hr />

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Email address</label>
                                <input
                                type="email"
                                class="form-control"
                                id="exampleInputEmail1"
                                name="email"
                                aria-describedby="emailHelp"
                                value="{{ $getRecord->email }}"
                                required
                                disabled
                                />
                            </div>
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

