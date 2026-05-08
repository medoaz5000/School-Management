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
            <h3 class="mb-0">Edit Assign Subject</h3>
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
                            <label class="form-label ">Class Name</label>
                            <select class="form-control" name="class_id" required id="">
                                <option class="form-control" value="">Select Class</option>
                                @foreach ($getClass as $class)
                                <option {{ ($getRecord->class_id == $class->id) ? 'selected' : ''}} class="form-control" value="{{ $class->id }}">{{ $class->name }}</option>    
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Subject Name</label>
                                @foreach ($getSubject as $subject)
                                    @php
                                        $checked = "";   
                                    @endphp
                                    @foreach($getAssignSubjectID as $subjectAssign)
                                        @if ($subjectAssign->subject_id == $subject->id)
                                            @php
                                                $checked = "checked";   
                                            @endphp 
                                        @endif
                                    @endforeach
                                <div class="">
                                    <input {{$checked}} type="checkbox" name="subject_id[]" multiple value="{{ $subject->id }}"  class="form-check-input"  id="gridCheck1"> {{ $subject->name }}
                                </div>
                                @endforeach
                        </div>

                      <div class="mb-3 mt-3 col-md-6">
                        <label class="form-label ">Status</label>
                            <select class="form-control" name="status" id="">
                                <option {{ ($getRecord->status == 0) ? 'selected' : ''}}class="form-control" value="0">Active</option>
                                <option {{ ($getRecord->status == 1) ? 'selected' : ''}} class="form-control" value="1">Inactive</option>
                            </select>
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

