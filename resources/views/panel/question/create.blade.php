@extends('panel.layout.app')
@section('title', 'question create')


@section('content')

    <div class="row">

        <div class="col-12">

            <form method="post" action="{{ route('panel.question.store') }}" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create new question</h4>
                    </div>
                    <div class="card-body">

                        <div class="mb-3 row">
                            <label for="question" class="col-md-2 col-form-label">Question</label>
                            <div class="col-md-10">
                                <input class="form-control"
                                       type="text"
                                       name="question"
                                       id="question"
                                value="{{ old('question') }}">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="answer" class="col-md-2 col-form-label">Answer</label>
                            <div class="col-md-10">
                            <textarea
                                name="answer"
                                class="form-control"
                                id="body">{{ old('answer') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="sorting" class="col-md-2 col-form-label">Sort order</label>
                            <div class="col-md-10">
                                <input class="form-control"
                                       type="number"
                                       name="sorting"
                                       id="sorting"
                                       value="{{ old('sorting') }}">
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
