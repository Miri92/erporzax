@extends('panel.layout.app')
@section('title', 'Slider Edit')


@section('content')

    <div class="row">

        <div class="col-12">

            <form method="post" action="{{ route('panel.slider.update', $row->id) }}" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit slider</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="title" class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" id="title"
                                value="{{ $row->title }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="link" class="col-md-2 col-form-label">Link</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="link" id="link"
                                value="{{ $row->link }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="button_name" class="col-md-2 col-form-label">Button name</label>
                            <div class="col-md-10">
                                <input
                                    name="button_name"
                                    class="form-control"
                                    type="text"
                                    id="button_name"
                                value="{{ $row->button_name }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="body" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                            <textarea
                                name="body"
                                class="form-control"
                                id="body">{{ $row->body }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="photo" class="col-md-2 col-form-label">Photo</label>
                            <div class="col-md-10">
                                <input name="photo"
                                       class="form-control form-control-md" id="photo" type="file">
                                @if($row->photo)
                                <p>
                                    <a href="{{ url($row->photo) }}">
                                        <img class="img-thumbnail"
                                             style="max-width: 150px"
                                             src="{{ url('uploads/'.$row->photo) }}" alt="">
                                    </a>
                                </p>
                                @endif
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="publish" class="col-md-2 col-form-label">Publish</label>
                            <div class="col-md-10">
                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                    <input name="publish"
                                           class="form-check-input"
                                           type="checkbox"
                                           id="publish"
                                           value="1" {{$row->status == 1? 'checked':''}}>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary w-md float-end">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>


                @csrf
            </form>

        </div>
    </div>

@endsection
