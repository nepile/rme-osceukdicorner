@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <span>{{ session('warning') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span>{{ session('danger') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session()->has('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span>{{ session('info') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session()->has('primary'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <span>{{ session('primary') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif