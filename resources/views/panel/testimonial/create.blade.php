@extends('panel.layout.app')
@section('title', 'testimonial create')


@section('content')

    <div class="row">

        <div class="col-12">

            <form method="post" action="{{ route('panel.testimonial.store') }}" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create new Testimonial</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="full_name" class="col-md-2 col-form-label">Full Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="full_name" id="full_name"
                                value="{{ old('full_name') }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="position" class="col-md-2 col-form-label">Position</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="position" id="position"
                                value="{{ old('position') }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="body" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                            <textarea
                                name="body"
                                class="form-control"
                                id="body">{{ old('body') }}</textarea>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="photo" class="col-md-2 col-form-label">Photo</label>
                            <div class="col-md-10">
                                <input name="photo" class="form-control form-control-md" id="photo" type="file">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="publish" class="col-md-2 col-form-label">Publish</label>
                            <div class="col-md-10">
                                <div class="form-check form-switch form-switch-lg mb-3" dir="ltr">
                                    <input name="publish" class="form-check-input" type="checkbox" id="publish" value="1" checked>
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
