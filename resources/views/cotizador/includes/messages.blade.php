@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show w-100 rounded" role="alert">
        <p>
            {{ session('success') }}
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show w-100 rounded" role="alert">
        <p>
            {{ session('error') }}
        </p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

