@extends('panel.layout.app')
@section('title', 'Pages edit')


@section('content')

    <div class="row">

        <div class="col-12">

            <form method="post" action="{{ route('panel.pages.update', $row->id) }}" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit page</h4>
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
                            <label for="slug" class="col-md-2 col-form-label">Slug</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="slug" id="slug"
                                       value="{{ $row->slug }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="seo_title" class="col-md-2 col-form-label">Seo Title</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="seo_title" id="seo_title"
                                       value="{{ $row->seo_title  }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="seo_desc" class="col-md-2 col-form-label">Seo Description</label>
                            <div class="col-md-10">
                                <textarea
                                    name="seo_desc"
                                    class="form-control">{{ $row->seo_desc  }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea
                                    name="content"
                                    class="form-control"
                                    id="ckeditor-classic">{{ $row->content }}</textarea>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="photo" class="col-md-2 col-form-label">Photo</label>
                            <div class="col-md-10">
                                <input name="photo" class="form-control form-control-md" id="photo" type="file">

                                @if($row->photo)
                                    <p>
                                        <a href="{{ url('uploads/'.$row->photo) }}">
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
                                           value="1" {{$row->status == 1? 'checked':''}}>                                </div>
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
@section('footer-js')
    <script src="{{ asset('/panel/borex/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ asset('/panel/borex/assets/js/pages/form-editor.init.js') }}"></script>

@endsection
