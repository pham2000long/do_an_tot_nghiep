@if (session('error'))
    <div class="alert alert-outline-danger" role="alert">
            {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-outline-success" role="alert">
        {{ session('success') }}
    </div>
@endif
