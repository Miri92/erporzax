@extends('panel.layout.app')
@section('title', 'Dashboard')


@section('content')
    <div class="row">

        <div class="col-12">

            <form method="post" action="{{ route('panel.slider.update', $row->id) }}" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit slider</h4>
                    </div>
                    <div class="card-body">


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
