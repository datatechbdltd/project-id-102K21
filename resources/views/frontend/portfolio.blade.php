@extends('layouts.frontend.app')
@section('content')
    <section id="hero" class="d-flex align-items-center" style="height: 350px">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos-delay="100">
                    <h1>{{ get_static_option('banner_highlight') }}</h1>
                    <h2>{{ get_static_option('banner_description') }}</h2>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">
                        <div class="swiper-wrapper align-items-center" id="swiper-wrapper-8718cb126a05104c" aria-live="off" style="transform: translate3d(-2568px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="2" role="group" aria-label="1 / 5" style="width: 856px;">
                                <img src="{{ asset('assets/frontend/img/portfolio/portfolio-3.jpg') }}" alt="">
                            </div>

                            <div class="swiper-slide swiper-slide-duplicate-next" data-swiper-slide-index="0" role="group" aria-label="2 / 5" style="width: 856px;">
                                <img src="{{ asset('assets/frontend/img/portfolio/portfolio-3.jpg') }}" alt="">
                            </div>

                            <div class="swiper-slide swiper-slide-prev" data-swiper-slide-index="1" role="group" aria-label="3 / 5" style="width: 856px;">
                                <img src="{{ asset('assets/frontend/img/portfolio/portfolio-3.jpg') }}" alt="">
                            </div>

                            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="2" role="group" aria-label="4 / 5" style="width: 856px;">
                                <img src="{{ asset('assets/frontend/img/portfolio/portfolio-3.jpg') }}" alt="">
                            </div>

                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-next" data-swiper-slide-index="0" role="group" aria-label="5 / 5" style="width: 856px;">
                                <img src="{{ asset('assets/frontend/img/portfolio/portfolio-3.jpg') }}" alt="">
                            </div></div>
                        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>: Web design</li>
                            <li><strong>Client</strong>: ASU Company</li>
                            <li><strong>Project date</strong>: 01 March, 2020</li>
                            <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>This is an example of portfolio detail</h2>
                        <p>
                            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection

