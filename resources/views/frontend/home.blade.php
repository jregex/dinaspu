<main class="main">
    <x-hero />

    <!-- Features Section -->
    <section id="features" class="features section my-5">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Layanan</h2>
            <p class="description-title">Cek Layanan kami</p>
        </div>
        <!-- End Section Title -->
        <div class="container">
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="features-item">
                        <i class="bi bi-file-bar-graph" style="color: #ffbb2c"></i>
                        <h3><a href="https://dpupr.bantaengkab.go.id/newsianata" target="_blank"
                                class="stretched-link">New Sianata</a></h3>
                    </div>
                </div>
                <!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="features-item">
                        <i class="bi bi-globe-asia-australia" style="color: #5578ff"></i>
                        <h3><a href="https://dpupr.bantaengkab.go.id/geoportal2" target="_blank"
                                class="stretched-link">Geoportal</a></h3>
                    </div>
                </div>
                <!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="features-item">
                        <i class="bi bi-buildings" style="color: #e80368"></i>
                        <h3><a href="https://dpupr.bantaengkab.go.id/infrastruktur" target="_blank"
                                class="stretched-link">Infrastruktur</a></h3>
                    </div>
                </div>
                <!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="features-item">
                        <i class="bi bi-file-zip" style="color: #e361ff"></i>
                        <h3><a href="https://dpupr.bantaengkab.go.id/Arsip" target="_blank"
                                class="stretched-link">Archive</a></h3>
                    </div>
                </div>
                <!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="features-item">
                        <a href="http://lpse.bantaengkab.go.id/eproc4/lelang" target="_blank">
                            <img src="{{ asset('user') }}/assets/img/LPSE.png" class="img-fluid" height="48" />
                        </a>
                        {{-- <h3><a href="" class="stretched-link">LPSE</a></h3> --}}
                    </div>
                </div>
                <!-- End Feature Item -->
            </div>
        </div>
    </section>
    <!-- /Features Section -->


    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

        <div class="container" data-aos="fade-up">

            <div class="row justify-content-between gy-4">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">

                    <div class="portfolio-description mb-5">
                        <div class="portfolio-info">
                            <h3>Sambutan</h3>
                        </div>
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Website ini merupakan wujud nyata dari semangat Reformasi birokrasi yang telah
                                    dicanangkan Kabupaten Bantaeng. Dan diharapkan tercipta transparansi pelayanan
                                    publik yang akan bermuara pada peningkatan akuntabilitas kinerja Pemerintah
                                    khususnya Dinas Pekerjaan Umum dan Penataan Ruang.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <div>
                                <img src="{{ asset('user') }}/assets/img/kepala-dinas.jpg" class="testimonial-img"
                                    alt="">
                                <h3>Ir ANDI SJAFARUDDIN MAGAU</h3>
                                <h4>Kepala Dinas PU Kab. Bantaeng</h4>
                            </div>
                        </div>

                    </div>
                    <div class="portfolio-description mt-4">
                        <div class="portfolio-info">
                            <h3>Visi Misi Kab. Bantaeng</h3>
                        </div>
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>TERWUJUDNYA MASYARAKAT BANTAENG YANG SEJAHTERA LAHIR DAN BATIN
                                    BEROREANTASI PADA KEMAJUAN , KEADILAN , KELESTARIAN , DAN KEUNGGULAN BERBASIS AGAMA
                                    DAN
                                    BUDAYA LOKAL.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <ol class="list list-ordened">
                                <li>Mewujudkan sumber daya manusia yang berkualitas.</li>
                                <li>Meningkatkan akselerasi program pengentasan kemiskinan dan perluasan kesempatan
                                    kerja.</li>
                                <li>Meningkatkan akses, pemerataan dan kualitas pelayanan kesehatan dan pelayanan sosial
                                    dasar lainnya</li>
                                <li>Mengoptimalkan kualitas dan pemerataan pembangunan infrastruktur yang berbasis
                                    kelestarian lingkungan</li>
                                <li>Mengoptimalkan pengembangan pertanian dan pemberdayaan ekonomi kerakyatan</li>
                            </ol>
                            <div>
                                <img src="{{ asset('user') }}/assets/img/bupati2.webp" class="testimonial-img"
                                    alt="">
                                <h3>M. FATHUL FAUZY NURDIN M.I.KOM</h3>
                                <h4>Bupati Kab. Bantaeng</h4>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <x-kominfo />
                </div>

            </div>

        </div>

    </section>
    <!-- /Portfolio Details Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>
                <span>Learn More</span>
                <span class="description-title">About Us<br /></span>
            </p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-5">
                <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                    <h3>Voluptatem dignissimos provident quasi</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis
                        aute irure dolor in reprehenderit
                    </p>
                    <a href="#" class="about-btn align-self-center align-self-xl-start"><span>About us</span>
                        <i class="bi bi-chevron-right"></i></a>
                </div>

                <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-briefcase"></i>
                            <h4>
                                <a href="" class="stretched-link">Corporis voluptates sit</a>
                            </h4>
                            <p>
                                Consequuntur sunt aut quasi enim aliquam quae harum pariatur
                                laboris nisi ut aliquip
                            </p>
                        </div>
                        <!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-gem"></i>
                            <h4>
                                <a href="" class="stretched-link">Ullamco laboris nisi</a>
                            </h4>
                            <p>
                                Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt
                            </p>
                        </div>
                        <!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-broadcast"></i>
                            <h4>
                                <a href="" class="stretched-link">Labore consequatur</a>
                            </h4>
                            <p>
                                Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut
                                maiores omnis facere
                            </p>
                        </div>
                        <!-- Icon-Box -->

                        <div class="col-md-6 icon-box position-relative">
                            <i class="bi bi-easel"></i>
                            <h4><a href="" class="stretched-link">Beatae veritatis</a></h4>
                            <p>
                                Expedita veritatis consequuntur nihil tempore laudantium
                                vitae denat pacta
                            </p>
                        </div>
                        <!-- Icon-Box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Check Our <span class="description-title">Services</span></p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-activity icon"></i></div>
                        <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
                        <p>
                            Voluptatum deleniti atque corrupti quos dolores et quas
                            molestias excepturi
                        </p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-bounding-box-circles icon"></i>
                        </div>
                        <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore
                        </p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                        <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
                        <p>
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa
                            qui officia
                        </p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                        <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
                        <p>
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis
                        </p>
                    </div>
                </div>
                <!-- End Service Item -->
            </div>
        </div>
    </section>
    <!-- /Services Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">
        <img src="{{ asset('user') }}/assets/img/cta-bg.jpg" alt="" />

        <div class="container">
            <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-10">
                    <div class="text-center">
                        <h3>Call To Action</h3>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.
                        </p>
                        <a class="cta-btn" href="#">Call To Action</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Call To Action Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p><span>Check Our</span> <span class="description-title">Portfolio</span></p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Card</li>
                    <li data-filter=".filter-branding">Web</li>
                </ul>
                <!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-1.jpg"
                            class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-1.jpg"
                                title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <img src="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-2.jpg"
                            class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>Product 1</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-2.jpg"
                                title="Product 1" data-gallery="portfolio-gallery-product"
                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <img src="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-3.jpg"
                            class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>Branding 1</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-3.jpg"
                                title="Branding 1" data-gallery="portfolio-gallery-branding"
                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-4.jpg"
                            class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>App 2</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-4.jpg"
                                title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <img src="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-5.jpg"
                            class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>Product 2</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-5.jpg"
                                title="Product 2" data-gallery="portfolio-gallery-product"
                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <img src="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-6.jpg"
                            class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>Branding 2</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-6.jpg"
                                title="Branding 2" data-gallery="portfolio-gallery-branding"
                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-7.jpg"
                            class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>App 3</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-7.jpg"
                                title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <img src="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-8.jpg"
                            class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>Product 3</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-8.jpg"
                                title="Product 3" data-gallery="portfolio-gallery-product"
                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <img src="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-9.jpg"
                            class="img-fluid" alt="" />
                        <div class="portfolio-info">
                            <h4>Branding 3</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('user') }}/assets/img/masonry-portfolio/masonry-portfolio-9.jpg"
                                title="Branding 2" data-gallery="portfolio-gallery-branding"
                                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                    <!-- End Portfolio Item -->
                </div>
                <!-- End Portfolio Container -->
            </div>
        </div>
    </section>
    <!-- /Portfolio Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pricing</h2>
            <p><span>Our Competing</span> <span class="description-title">Prices</span></p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="pricing-item">
                        <h3>Free Plan</h3>
                        <div class="icon">
                            <i class="bi bi-box"></i>
                        </div>
                        <h4><sup>$</sup>0<span> / month</span></h4>
                        <ul>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Quam adipiscing vitae proin</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Nec feugiat nisl pretium</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Nulla at volutpat diam uteera</span>
                            </li>
                            <li class="na">
                                <i class="bi bi-x"></i>
                                <span>Pharetra massa massa ultricies</span>
                            </li>
                            <li class="na">
                                <i class="bi bi-x"></i>
                                <span>Massa ultricies mi quis hendrerit</span>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="#" class="buy-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- End Pricing Item -->

                <div class="col-lg-4">
                    <div class="pricing-item featured">
                        <h3>Business Plan</h3>
                        <div class="icon">
                            <i class="bi bi-rocket"></i>
                        </div>

                        <h4><sup>$</sup>29<span> / month</span></h4>
                        <ul>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Quam adipiscing vitae proin</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Nec feugiat nisl pretium</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Nulla at volutpat diam uteera</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Pharetra massa massa ultricies</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Massa ultricies mi quis hendrerit</span>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="#" class="buy-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- End Pricing Item -->

                <div class="col-lg-4">
                    <div class="pricing-item">
                        <h3>Developer Plan</h3>
                        <div class="icon">
                            <i class="bi bi-send"></i>
                        </div>
                        <h4><sup>$</sup>49<span> / month</span></h4>
                        <ul>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Quam adipiscing vitae proin</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Nec feugiat nisl pretium</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Nulla at volutpat diam uteera</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Pharetra massa massa ultricies</span>
                            </li>
                            <li>
                                <i class="bi bi-check"></i>
                                <span>Massa ultricies mi quis hendrerit</span>
                            </li>
                        </ul>
                        <div class="text-center">
                            <a href="#" class="buy-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
                <!-- End Pricing Item -->
            </div>
        </div>
    </section>
    <!-- /Pricing Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
            <p>
                <span>Section Title</span>
                <span class="description-title">Direda Flowed</span>
            </p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-container">
                        <div class="faq-item faq-active">
                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                            <div class="faq-content">
                                <p>
                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis
                                    urna id volutpat lacus laoreet non curabitur gravida.
                                    Venenatis lectus magna fringilla urna porttitor rhoncus
                                    dolor purus non.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus?</h3>
                            <div class="faq-content">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque
                                    habitant morbi. Id interdum velit laoreet id donec
                                    ultrices. Fringilla phasellus faucibus scelerisque
                                    eleifend donec pretium. Est pellentesque elit
                                    ullamcorper dignissim. Mauris ultrices eros in cursus
                                    turpis massa tincidunt dui.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>
                                Dolor sit amet consectetur adipiscing elit pellentesque?
                            </h3>
                            <div class="faq-content">
                                <p>
                                    Eleifend mi in nulla posuere sollicitudin aliquam
                                    ultrices sagittis orci. Faucibus pulvinar elementum
                                    integer enim. Sem nulla pharetra diam sit amet nisl
                                    suscipit. Rutrum tellus pellentesque eu tincidunt.
                                    Lectus urna duis convallis convallis tellus. Urna
                                    molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>
                                Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                            </h3>
                            <div class="faq-content">
                                <p>
                                    Dolor sit amet consectetur adipiscing elit pellentesque
                                    habitant morbi. Id interdum velit laoreet id donec
                                    ultrices. Fringilla phasellus faucibus scelerisque
                                    eleifend donec pretium. Est pellentesque elit
                                    ullamcorper dignissim. Mauris ultrices eros in cursus
                                    turpis massa tincidunt dui.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor?</h3>
                            <div class="faq-content">
                                <p>
                                    Molestie a iaculis at erat pellentesque adipiscing
                                    commodo. Dignissim suspendisse in est ante in. Nunc vel
                                    risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis
                                    blandit turpis cursus in
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>
                                    Enim ea facilis quaerat voluptas quidem et dolorem. Quis
                                    et consequatur non sed in suscipit sequi. Distinctio
                                    ipsam dolore et.
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div>
                        <!-- End Faq item-->
                    </div>
                </div>
                <!-- End Faq Column-->
            </div>
        </div>
    </section>
    <!-- /Faq Section -->

    <!-- Team 2 Section -->
    <section id="team-2" class="team-2 section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Team</h2>
            <p>Our Hardworking <span class="description-title">Team</span></p>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="{{ asset('user') }}/assets/img/team/team-1.jpg" class="img-fluid"
                            alt="" />
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Team Member -->

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <img src="{{ asset('user') }}/assets/img/team/team-2.jpg" class="img-fluid"
                            alt="" />
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Team Member -->

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <img src="{{ asset('user') }}/assets/img/team/team-3.jpg" class="img-fluid"
                            alt="" />
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Team Member -->

                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="member">
                        <img src="{{ asset('user') }}/assets/img/team/team-4.jpg" class="img-fluid"
                            alt="" />
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Team Member -->
            </div>
        </div>
    </section>
    <!-- /Team 2 Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p><span>Butuh bantuan?</span> <span class="description-title">Kontak kami<br></span></p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                <iframe style="border: 0; width: 100%; height: 270px"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.195306637738!2d119.9397846!3d-5.538027700000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbeb31435ce7edb%3A0xa0eab8e1cd755f4c!2sDinas%20Pekerjaan%20Umum%20Dan%20Penataan%20Ruang!5e0!3m2!1sen!2sid!4v1747643353956!5m2!1sen!2sid"
                    frameborder="0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- End Google Maps -->

            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>Bonto Atu, Bissappu, Bantaeng Regency, South Sulawesi 92451</p>
                        </div>
                    </div>
                    <!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>No Telp</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>
                    <!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email</h3>
                            <p>info@example.com</p>
                        </div>
                    </div>
                    <!-- End Info Item -->
                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Nama"
                                    required="" />
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                    required="" />
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                    required="" />
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">
                                    Your message has been sent. Thank you!
                                </div>

                                <button type="submit">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End Contact Form -->
            </div>
        </div>
    </section>
    <!-- /Contact Section -->
</main>
