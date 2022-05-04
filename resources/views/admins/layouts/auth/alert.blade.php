@if ($errors->any())
    <div class="alert alert-outline-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-outline-success">
        {{ session('success') }}
    </div>
@endif
