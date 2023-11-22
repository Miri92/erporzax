
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
        </section>

        <section class="section__profile py-0 my-0 py-md-5 my-md-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 px-0">
                        <div class="bg__gray-light border-radius section-padding">
                            <div class="floating__box border-1 border border-color__light2 border-radius__20">
                                <h5 class="h5 fw-bold text-uppercase text__primary floated-title">ŞƏXSİ MƏLUMATLAR</h5>
                                <form class="row row-cols-1 row-cols-md-2 input-group w-100 m-0 g-3" action="">
                                    <div class="col-12 col-md-12">
                                        <div class="card border-0 rounded-0 bg-transparent h-100 p-0 mb-3">
                                            <div class="row d-flex align-items-center g-0">
                                                <div class="col-12 col-md-3 col-lg-2">
                                                    <div class="profile__img">
                                                        <input type="file" class="form-control" id="imageUpload">
                                                        <i class="far fa-camera"></i>
                                                        <img src="assets/images/testimonial1.png" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-9 col-lg-10">
                                                    <div class="card-body profile__info p-0">
                                                        <h5 class="h5 fw-bold text__color">Cameron Williamson</h5>
                                                        <p class="sub__title fw-medium text__gray-dark mb-0">Hüquqşünas, Ali məhkəmə</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="inputCompany" class="form-label">Təşkilat</label>
                                        <input type="text" class="form-control form__input" id="inputCompany" name="" placeholder="Some text...">
                                    </div>

                                    <div class="col">
                                        <label for="inputPosition" class="form-label">Vəzifə</label>
                                        <input type="text" class="form-control form__input" id="inputPosition" name="" placeholder="Some text...">
                                    </div>

                                    <div class="col">
                                        <label for="inputEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control form__input" id="inputEmail" name="" placeholder="Some text...">
                                    </div>

                                    <div class="col">
                                        <label for="inputMobile" class="form-label">Mobil</label>
                                        <input type="number" class="form-control form__input" id="inputEmail4" name="" placeholder="Some text...">
                                    </div>

                                    <div class="col-12 col-md-6 text-center text-md-start">
                                        <a href="#" type="submit" class="btn btn__submit mt-3">Dəyişikliyi yadda saxla</a>
                                    </div>

                                    <div class="col-12 col-md-6 text-center text-md-end">
                                        <a href="#" class="btn btn__logout mt-3">Çıxış</a>
                                    </div>
                                </form>
                            </div>
                            <div class="floating__box border-1 border border-color__light2 border-radius__20">
                                <h5 class="h5 fw-bold text-uppercase text__primary floated-title">KOMMENTLƏRİM</h5>

                                <div class="row g-4">
                                    <div class="col-12 col-md-12">
                                        <a href="#" class="btn d-flex bg-white hover-shadow text-decoration-none text-start justify-content-start align-items-baseline mw-100 mh-100 h-100 w-100">
                                            <i class="fal fa-pen-line fs-6 text__primary me-3"></i>
                                            <div class="info">
                                                <h5 class="h5 fw-bold text__primary">Azərbaycan Respublikasının Əmək Məcəlləsində dəyişiklik edilməsi haqqında</h5>
                                                <span class="sub__title fw-medium text__color">Azərbaycan Respublikasının Əmək Məcəlləsində dəyişiklik edilməsi haqqında</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <a href="#" class="btn d-flex bg-white hover-shadow text-decoration-none text-start justify-content-start align-items-baseline mw-100 mh-100 h-100 w-100">
                                            <i class="fal fa-pen-line fs-6 text__primary me-3"></i>
                                            <div class="info">
                                                <h5 class="h5 fw-bold text__primary">Azərbaycan Respublikasının Əmək Məcəlləsində dəyişiklik edilməsi haqqında</h5>
                                                <span class="sub__title fw-medium text__color">Azərbaycan Respublikasının Əmək Məcəlləsində dəyişiklik edilməsi haqqında</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <a href="#" class="btn d-flex bg-white hover-shadow text-decoration-none text-start justify-content-start align-items-baseline mw-100 mh-100 h-100 w-100">
                                            <i class="fal fa-pen-line fs-6 text__primary me-3"></i>
                                            <div class="info">
                                                <h5 class="h5 fw-bold text__primary">Azərbaycan Respublikasının Əmək Məcəlləsində dəyişiklik edilməsi haqqında</h5>
                                                <span class="sub__title fw-medium text__color">Azərbaycan Respublikasının Əmək Məcəlləsində dəyişiklik edilməsi haqqında</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <a href="#" class="btn d-flex bg-white hover-shadow text-decoration-none text-start justify-content-start align-items-baseline mw-100 mh-100 h-100 w-100">
                                            <i class="fal fa-pen-line fs-6 text__primary me-3"></i>
                                            <div class="info">
                                                <h5 class="h5 fw-bold text__primary">Azərbaycan Respublikasının Əmək Məcəlləsində dəyişiklik edilməsi haqqında</h5>
                                                <span class="sub__title fw-medium text__color">Azərbaycan Respublikasının Əmək Məcəlləsində dəyişiklik edilməsi haqqında</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="floating__box border-1 border border-color__light2 border-radius__20">
                                <h5 class="h5 fw-bold text-uppercase text__primary floated-title">ABUNƏ MƏLUMATLARI</h5>
                                <div class="row g-4">
                                    <div class="col-12 col-md-12">
                                        <div class="bg-white border-radius__5 p-4">
                                            <div class="row mb-3 g-4">
                                                <div class="col-12">
                                                    <h5 class="h5 text__primary fw-bold">
                                                        <i class="far fa-crown fa-lg fa-md fa-xs me-2"></i>
                                                        Premium istifadəçi
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="row align-items-center g-2">
                                                <div class="col-12 col-md-12 col-lg-4 text-start text-lg-start">
                                                    <p class="body__text2 text__grey fw-semibold mb-0">Başlama tarixi: 24.06.23</p>
                                                </div>
                                                <div class="col-12 col-md-12 col-lg-4 text-start text-lg-center">
                                                    <p class="body__text2 text__grey fw-semibold mb-0">Növbəti ödəniş tarixi: 25.07.23</p>
                                                </div>
                                                <div class="col-12 col-md-12 col-lg-4 text-start text-lg-end">
                                                    <a href="#" class="btn btn-download hover-shadow mt-3 mt-lg-0">
                                                        <i class="fas fa-arrow-down me-3"></i>
                                                        <span>Download invoice</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="floating__box border-0 py-0">
                                <div class="row g-4">
                                    <div class="col-12 col-md-12">
                                        <div class="card card__premium text-center border-0 border-radius__20">
                                            <div class="card-header text-center border-0 bg-transparent p-0">
                                                <h3 class="h3 fw-bold text-white mb-4">Premium abunə ol</h3>
                                                <p class="body__text1 fw-semibold text-white mb-0">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                            <div class="card-body justify-content-center text-start d-flex flex-column">
                                                <ul class="body__text2 fw-medium text-white mx-auto p-0">
                                                    <li>View professional comments</li>
                                                    <li>Make conversations with laweys</li>
                                                </ul>
                                            </div>
                                            <div class="card-footer text-center border-0 bg-transparent p-0">
                                                <a href="#" class="btn btn-white text-decoration-none fw-bold hover-shadow mx-auto"> <i class="far fa-crown fa-lg fa-md fa-xs me-2"></i>Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
