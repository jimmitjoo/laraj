@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ol class="text-left">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
@endif