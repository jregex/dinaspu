<!-- Hero Section -->
<section id="hero" class="hero-slider hero-style dark-background">
    {{-- <img src="{{ asset('user') }}/assets/img/slider/kepala_dinas.jpg" alt="" data-aos="fade-in" />

    <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2>Selamat datang</h2>
                <p>di website Dinas PU Kabupaten Bantaeng</p>
                <a href="#features" class="btn-get-started">Get Started</a>
            </div>
        </div>
    </div> --}}
    <!-- Slider main container -->
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <img src="{{ asset('user') }}/assets/img/slider/kepala_dinas.jpg" alt="" />

            </div>
            <div class="swiper-slide">
                <img src="{{ asset('user') }}/assets/img/slider/kepala_dinas.jpg" alt="" />

            </div>
            <div class="swiper-slide">
                <img src="{{ asset('user') }}/assets/img/slider/kepala_dinas.jpg" alt="" />

            </div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        {{-- <div class="swiper-scrollbar"></div> --}}
    </div>
</section>
<!-- /Hero Section -->

@section('js')
    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            speed: 1000,
            parallax: true,
            centeredSlides: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            watchSlidesProgress: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            scrollbar: {
                el: '.swiper-scrollbar',
            }
        });
    </script>
@endsection
