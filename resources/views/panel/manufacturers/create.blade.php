@extends('panel.layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Yeni İstehsalçı Yarat</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('panel.manufacturers.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Ad</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="İstehsalçı adı daxil edin" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success"><i class="bx bx-check me-1"></i> Yarat</button>
                            <a href="{{ route('panel.manufacturers.index') }}" class="btn btn-secondary ms-2"><i class="bx bx-arrow-back me-1"></i> Geri</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
