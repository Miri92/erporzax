@extends('panel.layout.app')
@section('title', 'Slider')

@section('content')

    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">Slider List</h5>
            </div>
        </div>

        <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                <div>
                    <a href="{{ route('panel.slider.create') }}"
                       class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i>
                        Add New
                    </a>
                </div>

            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                            <tr>
                                <th>#id</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>Order</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                                @if($rows)
                                    @foreach($rows as $row)
                                        <tr>
                                            <th scope="row">{{$row->id}}</th>
                                            <td>{{$row->user_id}}</td>
                                            <td>

                                                @if($row->status == 0)
                                                    <span class="badge badge-soft-danger mb-0">{{ __('doc.status_'.$row->status) }}</span>
                                                @else
                                                    <span class="badge badge-soft-success mb-0">{{ __('doc.status_'.$row->status) }}</span>
                                                @endif

                                            </td>
                                            <td>{{$row->title}}</td>
                                            <td>
                                                <a href="">{{$row->photo }}</a>
                                            </td>
                                            <td>{{$row->order}}</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>

                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('panel.slider.edit', $row->id) }}"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           title=""
                                                           class="px-2 text-primary"
                                                           data-bs-original-title="Edit"
                                                           aria-label="Edit"><i class="bx bx-pencil font-size-18"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="" class="px-2 text-danger" data-bs-original-title="Delete" aria-label="Delete"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                    </li>
                                                    <li class="list-inline-item dropdown">
                                                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Another action</a>
                                                            <a class="dropdown-item" href="#">Something else here</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
