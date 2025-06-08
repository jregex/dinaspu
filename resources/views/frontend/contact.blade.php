  <main class="main">
      <!-- Page Title -->
      <div class="page-title dark-background"
          style="background-image: url({{ asset('user') }}/assets/img/page-title-bg.webp);">
          <div class="container position-relative">
              <h1>Contact</h1>
              <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                  molestias.</p>
              <nav class="breadcrumbs">
                  <ol>
                      <li><a href="/" wire:navigate>Beranda</a></li>
                      <li class="current">Contact</li>
                  </ol>
              </nav>
          </div>
      </div><!-- End Page Title -->
      <!-- Contact Section -->
      <section id="contact" class="contact section">

          <!-- Section Title -->
          <div class="container section-title" data-aos="fade-up">
              <h2>Contact</h2>
              <p><span>Butuh bantuan?</span> <span class="description-title">Kontak kami<br></span></p>
          </div><!-- End Section Title -->

          <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                  <iframe style="border:0; width: 100%; height: 270px;"
                      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.195306637738!2d119.9397846!3d-5.538027700000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbeb31435ce7edb%3A0xa0eab8e1cd755f4c!2sDinas%20Pekerjaan%20Umum%20Dan%20Penataan%20Ruang!5e0!3m2!1sen!2sid!4v1747643353956!5m2!1sen!2sid"
                      frameborder="0" allowfullscreen="" loading="lazy"
                      referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div><!-- End Google Maps -->

              <div class="row gy-4">

                  <div class="col-lg-4">
                      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                          <i class="bi bi-geo-alt flex-shrink-0"></i>
                          <div>
                              <h3>Alamat</h3>
                              <p>Bonto Atu, Bissappu, Bantaeng Regency, South Sulawesi 92451</p>
                          </div>
                      </div><!-- End Info Item -->

                      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                          <i class="bi bi-telephone flex-shrink-0"></i>
                          <div>
                              <h3>No Telp</h3>
                              <p>+1 5589 55488 55</p>
                          </div>
                      </div><!-- End Info Item -->

                      <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                          <i class="bi bi-envelope flex-shrink-0"></i>
                          <div>
                              <h3>Email</h3>
                              <p>info@example.com</p>
                          </div>
                      </div><!-- End Info Item -->

                  </div>

                  <div class="col-lg-8">
                      <form action="{{ asset('user') }}/forms/contact.php" method="post" class="php-email-form"
                          data-aos="fade-up" data-aos-delay="200">
                          <div class="row gy-4">

                              <div class="col-md-6">
                                  <input type="text" name="name" class="form-control" placeholder="Nama"
                                      required="">
                              </div>

                              <div class="col-md-6 ">
                                  <input type="email" class="form-control" name="email" placeholder="Email"
                                      required="">
                              </div>

                              <div class="col-md-12">
                                  <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                      required="">
                              </div>

                              <div class="col-md-12">
                                  <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required=""></textarea>
                              </div>

                              <div class="col-md-12 text-center">
                                  <div class="loading">Loading</div>
                                  <div class="error-message"></div>
                                  <div class="sent-message">Your message has been sent. Thank you!</div>

                                  <button type="submit">Kirim</button>
                              </div>

                          </div>
                      </form>
                  </div><!-- End Contact Form -->

              </div>

          </div>

      </section><!-- /Contact Section -->
  </main>
