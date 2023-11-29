
@extends('front.layouts.app')
@section('title', 'Home')

@section('content')

<!-- Main -->
<main class="main flex-shrink-0 w-100">
    <section class="section__header pt-5 mt-5">
        <div class="bg__gray-light mt-5">
            <div class="container px-3 px-md-0">
                <div class="row g-0">
                    <div class="col-12 px-3 px-md-0"><nav class="breadcrumbs__nav" aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Ana səhifə</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$row->title}}</li>
                            </ol>
                        </nav></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__about py-5 mt-4">
        <div class="container px-3 px-md-0">
            <div class="row g-4 pb-4">
                <div class="col-12 col-md-8">
                    <div class="h-100">
                        <h3 class="h3 fw-bold text__primary mb-4">{{$row->title}}</h3>

                        <div>
                            {!! $row->content !!}
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="position-relative overflow-hidden border-radius__5 h-100">
                        <img src="{{ asset('uploads/'.$row->photo) }}" alt="About company" class="img-fluid object-fit-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section__links py-2 mt-3 mb-5">
        <div class="container px-3 px-md-0">
            <div class="row g-5 g-md-4">
                <div class="col-12 col-md-8">
                    <a href="news-single.html" class="card card__video position-relative overflow-hidden text-decoration-none border-0 border-radius__5 h-100">
                        <div class="h-100">
                            <img src="assets/images/video-bg.png" class="card-img-top object-fit-cover h-100" alt="Photo gallery">
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

    <section class="section__contact py-5 mt-3 mb-2 mb-md-5 ">
        <div class="container px-3 px-md-0">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col-12 col-md-12">
                    <h3 class="h3 fw-bold text__primary text-center text-md-start mb-4">Bizimlə əlaqə</h3>
                </div>
                <div class="col contact__col">
                    <div class="card card__contact h-100">
                        <div class="icon__block">
                            <i class="far fa-phone text__color"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="h5 fw-semibold text__gray-dark text-center mx-auto mb-0">(629) 555-0129</h5>
                        </div>
                    </div>
                </div>
                <div class="col contact__col">
                    <div class="card card__contact h-100">
                        <div class="icon__block">
                            <i class="far fa-envelope text__color"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="h5 fw-semibold text__gray-dark text-center mx-auto mb-0">info@prakkom.az</h5>
                        </div>
                    </div>
                </div>
                <div class="col contact__col">
                    <div class="card card__contact h-100">
                        <div class="icon__block">
                            <i class="far fa-map-marker-alt text__color"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="h5 fw-semibold text__gray-dark text-center mx-auto mb-0">2715 Ash Dr. San Jose, South Dakota 83475</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
