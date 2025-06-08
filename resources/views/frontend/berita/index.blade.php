<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background"
        style="background-image: url({{ asset('user') }}/assets/img/slider/bantaeng1.JPG);">
        <div class="container position-relative">
            <h1>Berita</h1>
            <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
                molestias.</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Beranda</a></li>
                    <li class="current">Berita</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

        <div class="container">
            <div class="row gy-4">

                @foreach ($beritas as $item)
                    <div class="col-lg-4">
                        <article>

                            <div class="post-img">
                                <img src="{{ asset('storage/public/berita') }}/{{ $item->image }}" width="100%"
                                    alt="{{ $item->title }}" class="img-fluid">
                            </div>

                            <p class="post-category">{{ $item->category->category }}</p>

                            <h2 class="title">
                                <a href="{{ route('berita.detail', ['slug' => $item->slug]) }}">{{ $item->title }}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/public/profile') }}/default.webp" alt=""
                                    class="flex-shrink-0 img-fluid post-author-img">
                                <div class="post-meta">
                                    <p class="post-author">{{ $item->penulis }}</p>
                                    <p class="post-date">
                                        <time
                                            datetime="2022-01-01">{{ date('l, d M Y', strtotime($item->updated_at)) }}</time>
                                    </p>
                                </div>
                            </div>

                        </article>
                    </div><!-- End post list item -->
                @endforeach


            </div>
        </div>

    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

        <div class="container">
            <div class="d-flex justify-content-center">
                {{ $beritas->links() }}
                {{-- <ul>
                    <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#" class="active">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li>...</li>
                    <li><a href="#">10</a></li>
                    <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                </ul> --}}
            </div>
        </div>

    </section><!-- /Blog Pagination Section -->

</main>
