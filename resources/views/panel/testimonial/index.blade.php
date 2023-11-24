@extends('panel.layout.app')
@section('title', 'Testimonials')

@section('content')

    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">Testimonia List</h5>
            </div>
        </div>

        <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                <div>
                    <a href="{{ route('panel.testimonial.create') }}"
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
                <form action="#">
                    @csrf
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

                                                <a href="{{ url('uploads/'.$row->photo) }}">
                                                    <img class="img-thumbnail"
                                                         style="max-width: 150px"
                                                         src="{{ url('uploads/'.$row->photo) }}" alt="">
                                                </a>
                                            </td>
                                            <td>{{$row->order}}</td>
                                            <td>{{$row->created_at}}</td>
                                            <td>

                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('panel.testimonial.edit', $row->id) }}"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           title=""
                                                           class="px-2 text-primary"
                                                           data-bs-original-title="Edit"
                                                           aria-label="Edit"><i class="bx bx-pencil font-size-18"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">

                                                        <button class="px-2 text-danger btn"
                                                                data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                data-bs-original-title="Delete"
                                                                aria-label="Delete"
                                                        formaction="{{ route('panel.testimonial.delete', $row->id) }}"
                                                        formmethod="post"
                                                        type="submit">
                                                            <i class="bx bx-trash-alt font-size-18"></i>
                                                        </button>
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
                </form>
            </div>
        </div>
    </div>
@endsection
