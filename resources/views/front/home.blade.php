
@extends('front.layouts.app')
@section('title', 'Home')

@section('content')

<!-- Main -->
<main class="main flex-shrink-0 w-100">

    @if($slider)
    <section class="section__jumborton position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="row background-img cover d-flex justify-content-start align-items-end h-100"
                 style="background-image: url('{{ asset(url('/uploads/'.$slider->photo))}}')">
                <div class="col-12">
                    <div class="position-relative">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 px-0">
                                    <h2 class="h2 text__primary fw-bold mb-4">{{$slider->title}}</h2>
                                    <p class="body__text1 text__color fw-normal mb-4">
                                        {{$slider->body}}
                                    </p>

                                    <a href="#" class="btn btn-primary__outline body__text2 fw-bold">
                                        <span>{{ $slider->button_name }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="section__links py-5 mt-3 mt-md-5">
        <div class="container px-3 px-md-0">
            <div class="row g-5 g-md-4">
                <div class="col-12 col-md-8">
                    <a href="news-single.html" class="card card__video position-relative overflow-hidden text-decoration-none border-0 border-radius__5 h-100">
                        <div class="h-100">
                            <img src="assets/images/video-bg.png" class="card-img-top object-fit-cover h-100" alt="Photo gallery" />
                            <span class="icon__video position-absolute top-50 start-50 translate-middle mb-auto">
							<i class="fal fa-circle-play text-white z-2"></i>
						</span>
                            <div class="col-12 col-md-5 card-body position-absolute top-0 start-0 d-flex align-items-baseline flex-column z-2 h-100">
                                <h3 class="h3 fw-bold text__white text__overflow mt-auto mb-3">Video çarx</h3>
                                <p class="sub__title fw-medium text__white text__overflow2 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-md-4">
                    <div class="container-fluid section__grid h-100 px-0">
                        <div class="row h-100">
                            <div class="col-12 col-md-12 grid__item">
                                <a href="#" class="btn btn-primary position-relative overflow-hidden text-decoration-none border-0 bg__primary border-radius__5 d-flex align-items-center justify-content-center h-100 w-100 mw-100 mh-100">
                                    <span class="h4 fw-bold text__white m-auto">Kommentariyalar</span>
                                </a>
                            </div>
                            <div class="col-12 col-md-12 grid__item">
                                <a href="#" class="btn btn-primary position-relative overflow-hidden text-decoration-none border-0 bg__primary border-radius__5 d-flex align-items-center justify-content-center h-100 w-100 mw-100 mh-100">
                                    <span class="h4 fw-bold text__white m-auto">Sual - cavab</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__testimonials bg__gray-light py-5 mt-3 mt-md-5">
        <div class="container">
            <div class="row align-items-center justify-content-center mb-3">
                <div class="col-12">
                    <h4 class="h4 fw-bold text__primary text-center">MÜTƏXƏSSİS RƏYLƏRİ</h4>
                </div>
            </div>
            <div class="row swiper-container">
                <div class="col-12 px-0"><div class="swiper swiper__testimonials">
                        <div class="swiper-wrapper">

                            @if($testimonials || $testimonials->count() > 0)

                                @foreach($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <a href="#" class="card card__testimonial text-decoration-none h-100">
                                            <div class="card-body pt-5">
                                                <div class="avatar"><img src="{{asset('/uploads/'.$testimonial->photo)}}"></div>
                                                <h6 class="h6 fw-semibold text__color mt-4 mb-1">{{$testimonial->full_name}}</h6>
                                                <p class="body__text3 fw-medium text__gray-dark">{{$testimonial->position}}</p>
                                                <p class="body__text2 fw-normal text__gray-dark">{{$testimonial->body}}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between g-0 my-5">
                <div class="col-8 col-md-10 position-relative">
                    <div class="swiper-scrollbar"></div>
                </div>
                <div class="col-4 col-md-2">
                    <div class="swiper__nav position-relative d-flex align-items-center justify-content-center w-100">
                        <div class="swiper-button-prev btn__prev">
                            <i class="fa-regular fa-arrow-left-long"></i>
                        </div>
                        <div class="swiper-button-next btn__next">
                            <i class="fa-regular fa-arrow-right-long"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
