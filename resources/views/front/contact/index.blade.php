
@extends('front.layouts.app')
@section('title', 'Home')

@section('content')

<!-- Main -->
<main class="main flex-shrink-0 w-100">
    <section class="section__contacts pt-5 mt-5 pb-0 mt-0 py-md-5 my-md-5">
        <div class="container px-3 px-md-0">
            <div class="row g-4 py-5">
                <div class="col-12 col-md-5">
                    <div class="h-100">
                        <h3 class="h3 fw-bold text__primary mb-4">BİZİMLƏ ƏLAQƏ</h3>

                        <div class="row row-cols-2 align-items-center py-3 mb-3 g-4 g-md-5">
                            <div class="col">
                                <div class="d-flex align-items-center w-100">
                                    <div class="icon__block me-3">
                                        <i class="far fa-phone text__white"></i>
                                    </div>
                                    <a href="#" class="body__text2 fw-semibold text__color text-decoration-none mb-0">(629) 555-0129</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center w-100">
                                    <div class="icon__block me-3">
                                        <i class="far fa-phone text__white"></i>
                                    </div>
                                    <a href="#" class="body__text2 fw-semibold text__color text-decoration-none mb-0">info@prakkom.az</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center w-100">
                                    <div class="icon__block me-3">
                                        <i class="far fa-phone text__white"></i>
                                    </div>
                                    <a href="#" class="body__text2 fw-semibold text__color text-decoration-none mb-0">(629) 555-0129</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="d-flex align-items-center w-100">
                                    <div class="icon__block me-3">
                                        <i class="far fa-phone text__white"></i>
                                    </div>
                                    <a href="#" class="body__text2 fw-semibold text__color text-decoration-none mb-0">2715 Ash Dr. San Jose, South Dakota 83475</a>
                                </div>
                            </div>
                        </div>

                        <div class="map__iframe mt-5">
                            <iframe frameborder="0" scrolling="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8589.074673934896!2d50.0275837754212!3d40.437719462276185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403061043b005cbd%3A0x67b03e3eba5d9c28!2sBaku+Expo+Center!5e0!3m2!1sen!2s!4v1456302031948"></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 offset-0 offset-md-1 me-0 me-md-auto">
                    <div class="h-100">
                        <h3 class="h3 fw-bold text__primary mb-4">BİZƏ YAZIN</h3>
                        <form class="row row-cols-1 row-cols-md-1 input-group w-auto py-3 mb-3 g-3">
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Ad soyad</label>
                                <input type="email" class="form-control form__input" id="inputEmail4" name="" placeholder="fsdfdsf">
                            </div>
                            <div class="col">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control form__input" id="inputEmail4" name="" placeholder="fsdfdsf">
                            </div>
                            <div class="col-md-12">
                                <label for="inputAddress2" class="form-label">Mesajınız</label>
                                <textarea class="form-control form__input" placeholder="Leave a comment here" id="floatingTextarea2" name=""></textarea>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary px-5"><span>Göndər</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
