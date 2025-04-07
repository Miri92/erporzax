@extends('panel.layout.app')

@section('content')

    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <div class="row">

                        <div class="col-6">
                            <h4 class="card-title">İstehsalçı</h4>
                        </div>

                        <div class="col-6">
                            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                                
                                <div>
                                    <a href="{{ route('panel.manufacturers.create') }}" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Yeni İstehsalçı</a>
                                </div>
                                
                            </div>
                        
                        </div>
                        
                    </div>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($manufacturers as $manufacturer)
                                <tr>
                                    <td>{{ $manufacturer->name }}</td>
                                    <td>
                                        <a href="{{ route('panel.manufacturers.edit', $manufacturer) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bx bx-pencil font-size-16"></i>
                                        </a>

                                        <form action="{{ route('panel.manufacturers.destroy', $manufacturer) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="bx bx-trash-alt font-size-16"></i>
                                            </button>
                                        </form>

                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
