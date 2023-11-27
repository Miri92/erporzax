@extends('panel.layout.app')
@section('title', 'Question Edit')


@section('content')

    <div class="row">

        <div class="col-12">

            <form method="post" action="{{ route('panel.question.update', $row->id) }}" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit question</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="question" class="col-md-2 col-form-label">Question</label>
                            <div class="col-md-10">
                                <input class="form-control"
                                       type="text"
                                       name="question"
                                       id="question"
                                       value="{{ $row->question }}">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="ckeditor-classic" class="col-md-2 col-form-label">Answer</label>
                            <div class="col-md-10">
                            <textarea
                                name="answer"
                                class="form-control"
                                id="ckeditor-classic">{{ $row->answer }}</textarea>

                            </div>


                        </div>

                        <div class="mb-3 row">
                            <label for="sorting" class="col-md-2 col-form-label">Sort order</label>
                            <div class="col-md-10">
                                <input class="form-control"
                                       type="number"
                                       name="sorting"
                                       id="sorting"
                                       value="{{ $row->sorting }}">
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
