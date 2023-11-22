
@extends('front.layouts.app')
@section('title', 'Home')

@section('content')

<!-- Main -->
<main class="main flex-shrink-0 w-100">

    <section class="section__header pt-5 mt-5">
        <div class="bg__gray-light">
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
        <div class="container pt-5">
            <div class="row">
                <div class="col-12">
                    <h6 class="h6 fw-bold text__color mb-3">{{$paragraph->title_label}}</h6>
                    <h4 class="h4 fw-bold text__primary mb-4">{{$paragraph->title}}</h4>
                    <ol class="list-group body__text1 fw-normal text__color ms-3">
                        <li class="mb-3">
                            {{$paragraph->body}}
                        </li>
                    </ol>
                </div>
                <div class="col-12 col-md-12 d-flex flex-nowrap justify-content-start align-items-center mt-3 mt-md-3">
                    <a href="#" class="btn btn-primary body__text2 fw-bold w-100 px-3 px-md-5"><span>Komment yaz</span></a>
                </div>
                <div class="col-12 col-md-12 mt-4 mt-md-4">
                    <div class="d-flex flex-nowrap justify-content-start align-items-center body__text2 text__grey fw-semibold">
                        <i class="far fa-info-circle fa-lg fa-fw me-2"></i>
                        <span>Kommentariya yazmaq üçün qeydiyyatdan keçin.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
