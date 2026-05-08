@if(session()->has('success'))
    <div class="app-content">
          <div class="container-fluid">
            <div class="alert alert-success justify-content-center">
                <i class="bi bi-check-circle-fill"></i> 
                <strong>{{ session()->get('success') }}</strong>
                <button type="button" class="btn-close btn-sm float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="app-content">
          <div class="container-fluid">
            <div class="alert alert-danger justify-content-center">
                <center><i class="bi bi-exclamation-triangle-fill"></i> <b>{{ session()->get('error') }}</b></center>
            </div>
        </div>
    </div>
@endif



@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif

