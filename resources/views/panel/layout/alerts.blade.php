@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($errors = Session::get('errors'))
    <div class="alert alert-danger alert-block">

        <ul class="list-unstyled">
            @foreach ($errors->unique() as $error)
                <li><i class="icon fa fa-ban"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if (isset($errors) && $errors->any())
    <div class="alert alert-danger">
        Please check the form below for errors
    </div>
@endif
