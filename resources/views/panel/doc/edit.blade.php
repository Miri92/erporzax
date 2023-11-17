@extends('panel.layout.app')
@section('title', 'Doc')


@section('content')
    <div class="row">

        <div class="col-12">

            <form method="post" action="" enctype="multipart/form-data">


                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">

                        @if($paragraphs)
                            @foreach($paragraphs as $paragraph)


                                    @foreach($paragraph as $row)
                                        @if(isset($row['body']))
                                            <p>
                                                {!! $row['body'] !!}
                                            </p>
                                        @endif

                                    @endforeach

                            @endforeach
                        @endif
                    </div>
                </div>


                @csrf
            </form>

        </div>
    </div>




@endsection
