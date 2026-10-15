{{-- NEW FILE: banner dyal demo (kayban ghir ila DEMO_MODE=true) --}}
@if(config('demo.enabled'))

    {{-- Message dyal "action blocked": kayban foq, o visitor y9dr y-closih --}}
    @if(session('demo_blocked'))
        <div class="alert alert-warning alert-dismissible fade show shadow position-fixed top-0 start-50 translate-middle-x mt-3"
             style="z-index:2100; max-width:92vw;" role="alert">
            <i class="bi bi-lock-fill"></i> {{ session('demo_blocked') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Ribbon tabit lte7t. position:fixed => ma kaybddel walo f layout dyal AdminLTE (grid) --}}
    <div class="position-fixed bottom-0 start-0 end-0 text-center py-1 small bg-warning-subtle text-warning-emphasis border-top"
         style="z-index:2000;">
        <i class="bi bi-info-circle-fill"></i>
        <strong>Demo mode</strong> &mdash; read-only, data is for demonstration only.
        <a href="{{ url('logout') }}" class="ms-2">Switch role</a>
    </div>
@endif
