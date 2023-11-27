
@extends('front.layouts.app')
@section('title', 'Home')

@section('content')

<!-- Main -->
<main class="main flex-shrink-0 w-100">
    <section class="section__header pt-5 mt-5">
        <div class="bg__gray-light mt-5">
            <div class="container px-3 px-md-0 ">
                <div class="row g-0">
                    <div class="col-12 px-3 px-md-0"><nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{url('/')}}">Ana səhifə</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sual-cavab</li>
                            </ol>
                        </nav></div>
                </div>
            </div>
        </div>
        <div class="container">
            <form class="row input-group w-auto pt-5 g-3">
                <div class="col-12 col-md-6 mx-auto">
                    <div class="input-group search__box mb-5">
                        <input type="text" class="form-control" placeholder="Search...">
                        <a href="#" class="btn btn-white btn-search">
                            <i class="fa fa-search me-2"></i>
                            <span>Axtar</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="section__faq pb-5 mb-5">
        <div class="container px-3 px-md-0">
            <div class="row g-4 pb-4">

                @if($questions && $questions->count() > 0)

                    @foreach($questions as $row)
                        <div class="col-12 col-md-10 mx-auto">
                            <div class="d-inline-flex text-start justify-content-start align-items-baseline mb-3">
                                <p class="sub__title fw-medium text__color text-nowrap mb-0 me-3">Sual: </p>
                                <h6 class="h6 fw-bold text__color mb-0">{{$row->question}}</h6>
                            </div>
                            <div class="sub__title fw-medium text__primary">
                                {!! $row->answer !!}
                            </div>
                        </div>
                    @endforeach

                @endif


            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-6 mx-auto">

                    @if($questions && $questions->count() > 0)
                        {{$questions->links()}}
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
