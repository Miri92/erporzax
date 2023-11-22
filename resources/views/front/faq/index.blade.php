
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
                                <li class="breadcrumb-item"><a href="#">Ana səhifə</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kommentariyalar</li>
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
                <div class="col-12 col-md-10 mx-auto">
                    <div class="d-inline-flex text-start justify-content-start align-items-baseline mb-3">
                        <p class="sub__title fw-medium text__color text-nowrap mb-0 me-3">Sual 1</p>
                        <h6 class="h6 fw-bold text__color mb-0">Məzuniyyət haqqı ödənilərkən nəzərə alınan əmək haqqı növləri?</h6>
                    </div>
                    <a href="#" class="btn btn__faq text-decoration-none text-start justify-content-between align-items-baseline align-items-md-center mw-100 w-100">
                        <span class="body__text2 fw-medium text__color me-3"> Bax: </span>
                        <span class="sub__title fw-medium text__primary"> Hüquqi şəxslərin dövlət qeydiyyatı və dövlət reyestri haqqında | AZƏRBAYCAN RESPUBLİKASININ VERGİ MƏCƏLLƏSİ </span>
                        <i class="far fa-chevron-right text__primary fw-bold ms-auto me-0 me-md-3"></i>
                    </a>
                </div>
                <div class="col-12 col-md-10 mx-auto">
                    <div class="d-inline-flex text-start justify-content-start align-items-baseline mb-3">
                        <p class="sub__title fw-medium text__color text-nowrap mb-0 me-3">Sual 1</p>
                        <h6 class="h6 fw-bold text__color mb-0">Məzuniyyət haqqı ödənilərkən nəzərə alınan əmək haqqı növləri?</h6>
                    </div>
                    <a href="#" class="btn btn__faq text-decoration-none text-start justify-content-between align-items-baseline align-items-md-center mw-100 w-100">
                        <span class="body__text2 fw-medium text__color me-3"> Bax: </span>
                        <span class="sub__title fw-medium text__primary"> Hüquqi şəxslərin dövlət qeydiyyatı və dövlət reyestri haqqında | AZƏRBAYCAN RESPUBLİKASININ VERGİ MƏCƏLLƏSİ </span>
                        <i class="far fa-chevron-right text__primary fw-bold ms-auto me-0 me-md-3"></i>
                    </a>
                </div>
                <div class="col-12 col-md-10 mx-auto">
                    <div class="d-inline-flex text-start justify-content-start align-items-baseline mb-3">
                        <p class="sub__title fw-medium text__color text-nowrap mb-0 me-3">Sual 1</p>
                        <h6 class="h6 fw-bold text__color mb-0">Məzuniyyət haqqı ödənilərkən nəzərə alınan əmək haqqı növləri?</h6>
                    </div>
                    <a href="#" class="btn btn__faq text-decoration-none text-start justify-content-between align-items-baseline align-items-md-center mw-100 w-100">
                        <span class="body__text2 fw-medium text__color me-3"> Bax: </span>
                        <span class="sub__title fw-medium text__primary"> Hüquqi şəxslərin dövlət qeydiyyatı və dövlət reyestri haqqında | AZƏRBAYCAN RESPUBLİKASININ VERGİ MƏCƏLLƏSİ </span>
                        <i class="far fa-chevron-right text__primary fw-bold ms-auto me-0 me-md-3"></i>
                    </a>
                </div>
                <div class="col-12 col-md-10 mx-auto">
                    <div class="d-inline-flex text-start justify-content-start align-items-baseline mb-3">
                        <p class="sub__title fw-medium text__color text-nowrap mb-0 me-3">Sual 1</p>
                        <h6 class="h6 fw-bold text__color mb-0">Məzuniyyət haqqı ödənilərkən nəzərə alınan əmək haqqı növləri?</h6>
                    </div>
                    <a href="#" class="btn btn__faq text-decoration-none text-start justify-content-between align-items-baseline align-items-md-center mw-100 w-100">
                        <span class="body__text2 fw-medium text__color me-3"> Bax: </span>
                        <span class="sub__title fw-medium text__primary"> Hüquqi şəxslərin dövlət qeydiyyatı və dövlət reyestri haqqında | AZƏRBAYCAN RESPUBLİKASININ VERGİ MƏCƏLLƏSİ </span>
                        <i class="far fa-chevron-right text__primary fw-bold ms-auto me-0 me-md-3"></i>
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 col-md-6 mx-auto">
                    <nav class="pagination__nav d-flex justify-content-center mx-auto mt-3">
                        <ul class="pagination m-0">
                            <li class="page-item pagination__item previous disabled">
                                <a class="page-link pagination__link" href="#" tabindex="-1"> <i class="fa-regular fa-chevron-left"></i> </a>
                            </li>
                            <li class="page-item pagination__item ">
                                <a class="page-link pagination__link" href="#">1</a>
                            </li>
                            <li class="page-item pagination__item active">
                                <a class="page-link pagination__link" href="#">2</a>
                            </li>
                            <li class="page-item pagination__item">
                                <a class="page-link pagination__link" href="#">3</a>
                            </li>
                            <li class="page-item pagination__item disabled-dots disabled">
                                <a class="page-link pagination__link" href="#">...</a>
                            </li>
                            <li class="page-item pagination__item">
                                <a class="page-link pagination__link" href="#">8</a>
                            </li>
                            <li class="page-item pagination__item">
                                <a class="page-link pagination__link" href="#">9</a>
                            </li>
                            <li class="page-item pagination__item">
                                <a class="page-link pagination__link" href="#">10</a>
                            </li>
                            <li class="page-item pagination__item next">
                                <a class="page-link pagination__link" href="#"><i class="fa-regular fa-chevron-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
