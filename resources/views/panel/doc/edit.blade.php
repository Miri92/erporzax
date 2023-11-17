@extends('panel.layout.app')
@section('title', 'Doc Edit')


@section('content')
    <div class="row">

        <div class="col-12">
            <form method="post" action="https://prakkom.test/panel/doc/store" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Doc edit</h4>
                    </div>
                    <div class="card-body">



                        <div class="mb-3 row">
                            <label for="title" class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                                <input class="form-control"
                                       type="text"
                                       name="title"
                                       id="title"
                                       value="{{ $doc->title }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary w-md float-end">Update</button>
                            </div>
                        </div>
                    </div>
                </div>


                <input type="hidden" name="_token" value="XSuu4YumQ6Y45zu5g9fUH5ZGMahSwwzo5rZwETmA" autocomplete="off">
            </form>
        </div>
        <div class="col-12">

            <form method="post" action="" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Doc Paragraphs</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">

                                <thead class="table-light">
                                <tr>
                                    <th>#id</th>
                                    <th class="text-nowrap">Label</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($doc->paragraphs) && $doc->paragraphs->count() > 0)
                                    @foreach($doc->paragraphs as $paragraph)

                                        <tr>
                                            <td>{{$paragraph->id}}</td>
                                            <td class="text-nowrap">{{$paragraph->title_label}}</td>
                                            <td>{{$paragraph->title}}</td>
                                            <td></td>
                                        </tr>

                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                @csrf
            </form>

        </div>
    </div>




@endsection
