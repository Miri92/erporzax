
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

    <section class="section__laws pb-5">
        <div class="container px-3 px-md-0">

            @if($lawCommentParagraphs)
                @foreach($lawCommentParagraphs as $paragraph)
                    <div class="row g-3">
                        <div class="col-12 col-md-12">
                            <a href="{{ route('paragraph.show', $paragraph->id) }}"
                               class="btn btn__law text-decoration-none text-start justify-content-start align-items-center mw-100 mh-100 h-100 w-100">
                                <h6 class="h6 fw-bold text__color mb-0 me-4">{{$paragraph->title_label}}</h6>
                                <span class="sub__title fw-medium text__color">{{$paragraph->title}}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif


            <div class="row mt-3">
                @if($lawCommentParagraphs)
                    {{$lawCommentParagraphs->links()}}
                @endif
            </div>
        </div>
    </section>
</main>
@endsection
