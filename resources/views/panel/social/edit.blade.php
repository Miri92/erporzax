@extends('panel.layout.app')
@section('title', 'social Edit')


@section('content')

    <div class="row">

        <div class="col-12">

            <form method="post" action="{{ route('panel.social_icon.update', $row->id) }}" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit social </h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                value="{{ $row->name }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="url" class="col-md-2 col-form-label">Url</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="url" id="url"
                                value="{{ $row->url }}">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="icon" class="col-md-2 col-form-label">Icon</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="icon" id="icon"
                                       value="{{ $row->icon }}">
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
