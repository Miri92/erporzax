@extends('panel.layout.app')
@section('title', 'Doc create')


@section('content')


    <div class="row">

        <div class="col-12">

            <form method="post" action="{{ route('panel.doc.store') }}" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Doc create</h4>
                    </div>
                    <div class="card-body">

{{--                        <div class="mb-3 row">--}}
{{--                            <label for="name" class="col-md-2 col-form-label">Name</label>--}}
{{--                            <div class="col-md-10">--}}
{{--                                <input class="form-control" type="text" name="name" id="name"--}}
{{--                                       value="{{ old('name') }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="mb-3 row">
                            <label for="title" class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" id="title"
                                       value="{{ old('title') }}">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="photo" class="col-md-2 col-form-label">doc</label>
                            <div class="col-md-10">
                                <input name="doc"
                                       class="form-control form-control-md" id="doc" type="file">

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
