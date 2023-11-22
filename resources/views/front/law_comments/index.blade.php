
@extends('front.layouts.app')
@section('title', 'Home')

@section('content')

<!-- Main -->
<main class="main flex-shrink-0 w-100">

    <section class="section__header pt-5 mt-5">
        <div class="bg__gray-light mt-5">
            <div class="container">
                <div class="row g-0">
                    <div class="col-12 px-3 px-md-0"><nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">Ana səhifə</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kommentariyalar</li>
                            </ol>
                        </nav></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="px-4 py-4 my-4 text-center">
                        <h4 class="h4 fw-bold text-uppercase text__primary mb-0">KOMMENTARİYALAR</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__comments bg__gray-light py-5">
        <div class="container">
            <form class="row g-3">
                <div class="col-12 col-md-8 mx-auto">
                    <div class="input-group search__box mb-5">
                        <input type="text" class="form-control" placeholder="Search...">
                        <a href="#" class="btn btn-white btn-search">
                            <i class="fa fa-search me-2"></i>
                            <span>Axtar</span>
                        </a>
                    </div>
                </div>

                @if($lawComments)

                    @foreach($lawComments as $lawComment)
                        <div class="col-12 col-md-8 mx-auto">
                            <a href="{{ route('law_comments.show', $lawComment->id) }}"
                               class="btn btn__comment text-decoration-none text-start justify-content-between align-items-baseline mw-100 mh-100 h-100 w-100">
                                <span>{{$lawComment->title}}</span>
                                <i class="far fa-chevron-right ms-5"></i>
                            </a>
                        </div>
                    @endforeach

                @endif


            </form>

            <div class="row mt-3">
                <div class="col-12 col-md-6 mx-auto">

                    @if($lawComments)
                        {{$lawComments->links()}}
                    @endif

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
