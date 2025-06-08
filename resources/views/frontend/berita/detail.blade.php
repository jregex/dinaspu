  <main class="main">

      <!-- Page Title -->
      <div class="page-title dark-background"
          style="background-image: url({{ asset('user') }}/assets/img/page-title-bg.webp);">
          <div class="container position-relative">
              <h1>Detail berita</h1>
              <p>{{ $post->title }}</p>
              <nav class="breadcrumbs">
                  <ol>
                      <li><a href="/berita">Berita</a></li>
                      <li class="current">{{ $post->title }}</li>
                  </ol>
              </nav>
          </div>
      </div><!-- End Page Title -->

      <div class="container">
          <div class="row">

              <div class="col-lg-8">

                  <!-- Blog Details Section -->
                  <section id="blog-details" class="blog-details section">
                      <div class="container">

                          <article class="article">

                              <div class="post-img">
                                  <img src="{{ asset('storage/public/berita') }}/{{ $post->image }}" width="100%"
                                      alt="" class="img-fluid">
                              </div>

                              <h2 class="title">{{ $post->title }}</h2>

                              <div class="meta-top">
                                  <ul>
                                      <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                          {{ $post->penulis }}</li>
                                      <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time
                                              datetime="{{ date('Y-m-d', strtotime($post->updated_at)) }}">{{ date('l, d M Y', strtotime($post->updated_at)) }}</time>
                                      </li>
                                      {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                              href="blog-details.html">12 Comments</a></li> --}}
                                  </ul>
                              </div><!-- End meta top -->

                              <div class="content">

                                  {!! $post->body !!}

                              </div><!-- End post content -->

                              <div class="meta-bottom">
                                  <i class="bi bi-folder"></i>
                                  <ul class="cats">
                                      <li><a href="#">{{ $post->category->category }}</a></li>
                                  </ul>

                                  <i class="bi bi-tags"></i>
                                  <ul class="tags">
                                      @foreach ($categories as $item)
                                          <li><a href="#">{{ $item->category }}</a></li>
                                      @endforeach
                                  </ul>
                              </div><!-- End meta bottom -->

                          </article>

                      </div>
                  </section><!-- /Blog Details Section -->

              </div>

              <div class="col-lg-4 sidebar">

                  <div class="widgets-container">


                      <!-- Recent Posts Widget -->
                      <div class="recent-posts-widget widget-item">

                          <h3 class="widget-title">Recent Posts</h3>

                          <div class="post-item">
                              <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">
                              <div>
                                  <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                                  <time datetime="2020-01-01">Jan 1, 2020</time>
                              </div>
                          </div><!-- End recent post item-->

                          <div class="post-item">
                              <img src="assets/img/blog/blog-recent-2.jpg" alt="" class="flex-shrink-0">
                              <div>
                                  <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                                  <time datetime="2020-01-01">Jan 1, 2020</time>
                              </div>
                          </div><!-- End recent post item-->

                          <div class="post-item">
                              <img src="assets/img/blog/blog-recent-3.jpg" alt="" class="flex-shrink-0">
                              <div>
                                  <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a>
                                  </h4>
                                  <time datetime="2020-01-01">Jan 1, 2020</time>
                              </div>
                          </div><!-- End recent post item-->

                          <div class="post-item">
                              <img src="assets/img/blog/blog-recent-4.jpg" alt="" class="flex-shrink-0">
                              <div>
                                  <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                                  <time datetime="2020-01-01">Jan 1, 2020</time>
                              </div>
                          </div><!-- End recent post item-->

                          <div class="post-item">
                              <img src="assets/img/blog/blog-recent-5.jpg" alt="" class="flex-shrink-0">
                              <div>
                                  <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                  <time datetime="2020-01-01">Jan 1, 2020</time>
                              </div>
                          </div><!-- End recent post item-->

                      </div><!--/Recent Posts Widget -->

                  </div>

              </div>

          </div>
      </div>

  </main>
