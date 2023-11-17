@extends('panel.layout.app')
@section('title', 'Doc')

@section('content')

    <div class="row align-items-center">


        <div class="col-md-12">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                <div>
                    <a href="{{ route('panel.doc.create') }}"
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
                                <th>Doc file</th>
                                <th>Title</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                                @if($docs)
                                    @foreach($docs as $doc)
                                        <tr>
                                            <th scope="row">{{$doc->id}}</th>
                                            <td>{{$doc->user_id}}</td>
                                            <td>

                                                @if($doc->status == 0)
                                                    <span class="badge badge-soft-danger mb-0">{{ __('doc.status_'.$doc->status) }}</span>
                                                @else
                                                    <span class="badge badge-soft-success mb-0">{{ __('doc.status_'.$doc->status) }}</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ asset($doc->doc)  }}">{{$doc->title ?? 'Doc link'}}</a>
                                            </td>
                                            <td>{{$doc->title}}</td>
                                            <td>{{$doc->created_at}}</td>
                                            <td>

                                                <ul class="list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('panel.doc.edit', $doc->id) }}"
                                                           data-bs-toggle="tooltip"
                                                           data-bs-placement="top"
                                                           title=""
                                                           class="px-2 text-primary"
                                                           data-bs-original-title="Edit"
                                                           aria-label="Edit"><i class="bx bx-pencil font-size-18"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">

                                                        <form action="{{ route("panel.doc.delete",$doc->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                    class="px-2 text-danger btn"
                                                                    data-bs-toggle="tooltip"
                                                                    data-bs-placement="top"
                                                                    data-bs-original-title="Delete"
                                                                    aria-label="Delete" >
                                                                <i class="bx bx-trash-alt font-size-18"></i></button>
                                                        </form>
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
