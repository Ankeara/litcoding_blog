<!DOCTYPE blog>
<blog lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Blog Details - {{ $blog->name }}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ url('assets_frontend/img/favicon.png') }}" rel="icon">
        <link href="{{ url('assets_frontend/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ url('assets_frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets_frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ url('assets_frontend/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ url('assets_frontend/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets_frontend/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('assets_frontend/modules/summernote/summernote-bs4.css') }}">
        <link rel="stylesheet" href="{{ url('assets_frontend/modules/codemirror/lib/codemirror.css') }}">
        <link rel="stylesheet" href="{{ url('assets_frontend/modules/codemirror/theme/duotone-dark.css') }}">
        {{-- library of text editor like microsoft word --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css"
            integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- library of text editor like microsoft word --}}
        <!-- Main CSS File -->
        <link href="{{ url('assets_frontend/css/main.css') }}" rel="stylesheet">

        <!-- =======================================================
  * blog Name: FlexStart
  * blog URL: https://bootstrapmade.com/flexstart-bootstrap-startup-blog/
  * Updated: Jun 02 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    </head>

    <body class="blog-details-page">

        <header id="header" class="header d-flex align-items-center sticky-top">
            <div class="container-fluid container-xl position-relative d-flex align-items-center">

                <a href="index.blog" class="logo d-flex align-items-center me-auto">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <img src="assets/img/logo.png" alt="">
                    <h1 class="sitename">FlexStart</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('frontend.home') }}">Home<br></a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#team">Team</a></li>
                        <li><a href="{{ route('frontend.template') }}">Template</a></li>
                        <li><a href="{{ route('frontend.blog') }}" class="active">Blog</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <a class="btn-getstarted flex-md-shrink-0" href="index.blog#about">Get Started</a>

            </div>
        </header>

        <main class="main">

            <!-- Page Title -->
            <div class="page-title" data-aos="fade">
                <div class="heading">
                    <div class="container">
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col-lg-8">
                                <h1>Blog</h1>
                                <p class="mb-0">website that learns and reads, PHP, Framework Laravel, How to and
                                    download
                                    Admin blog sample source code free.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="breadcrumbs">
                    <div class="container">
                        <ol>
                            <li><a href="{{ route('frontend.home') }}">Home</a></li>
                            <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                            <li class="current">Blog Details</li>
                            <li class="current">
                                @if (isset($blog))
                                    {{ Str::words($blog->name, 10) }}
                                @endif
                            </li>
                        </ol>
                    </div>
                </nav>
            </div><!-- End Page Title -->

            <div class="container">
                <div class="row">
                    @if (isset($blog))
                        <div class="col-lg-8">
                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/blogs', $blog->image) }}" alt=""
                                                class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $blog->name }}</h2>

                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $blog->user->name }}</a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($blog->detail_this_template) !!}
                                            </p>
                                            <h2>
                                                {!! nl2br($blog->header_one) !!}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_one) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_one) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_two }}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_two) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_two) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_tree }}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_tree) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_tree) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_four }}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_four) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_four) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_five }}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_five) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_five) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_six }}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_six) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_six) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_seven }}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_seven) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_seven) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_eight }}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_eight) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_eight) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_nine }}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_nine) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_nine) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_ten }}
                                            </h2>
                                            <div class="post-img m-2">
                                                <img src="{{ url('/default/blogs', $blog->image_ten) }}"
                                                    alt="" class="img-fluid">
                                            </div>
                                            <p>
                                                {!! nl2br($blog->description_ten) !!}
                                            </p>
                                            <h2>
                                                {{ $blog->header_final }}
                                            </h2>
                                            <p>
                                                {!! nl2br($blog->description_final) !!}
                                            </p>

                                        </div><!-- End post content -->

                                        <div class="meta-bottom">
                                            <i class="bi bi-folder"></i>
                                            <ul class="cats">
                                                <li><a href="#">Business</a></li>
                                            </ul>

                                            <i class="bi bi-tags"></i>
                                            <ul class="tags">
                                                <li><a href="#">Creative</a></li>
                                                <li><a href="#">Tips</a></li>
                                                <li><a href="#">Marketing</a></li>
                                            </ul>
                                        </div><!-- End meta bottom -->

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->
                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $blog->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $blog->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <p>
                                                Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed
                                                possimus
                                                accusantium. Quas repellat voluptatem officia numquam sint aspernatur
                                                voluptas.
                                                Esse et accusantium ut unde voluptas.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->
                        </div>
                    @endif
                    <div class="col-lg-4 sidebar position-sticky">

                        <div class="widgets-container">

                            <!-- Search Widget -->
                            <div class="search-widget widget-item">

                                <h3 class="widget-title">Search</h3>
                                <form action="{{ route('frontend.template') }}" id="searchForm" name="searchForm"
                                    method="GET">
                                    <input type="text" name="keywords" id="keywords"
                                        value="{{ Request::get('keywords') }}">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!--/Search Widget -->

                            <!-- Categories Widget -->
                            <div class="categories-widget widget-item">

                                <h3 class="widget-title">Categories</h3>
                                <ul class="mt-3">
                                    @if ($category->isNotEmpty())
                                        @foreach ($category as $cate)
                                            <li>
                                                <a href="{{ route('frontend.template', ['category' => $cate->id]) }}">
                                                    {{ $cate->name }}
                                                    <span>({{ $category->where('id', $cate->id)->count() ?? 0 }})</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div><!--/Categories Widget -->

                            <!-- Recent Posts Widget -->
                            <div class="recent-posts-widget widget-item">

                                <h3 class="widget-title">Recent Posts</h3>

                                @if ($blogSidebar->isNotEmpty())
                                    @foreach ($blogSidebar as $item)
                                        <div class="post-item">
                                            <img src="{{ url('/default/blogs/' . $item->image) }}" alt=""
                                                class="flex-shrink-0">
                                            <div>
                                                <h4><a
                                                        href="{{ route('frontend.blog-detail', $item->id) }}">{{ $item->name }}</a>
                                                </h4>
                                                <time
                                                    datetime="2020-01-01">{{ \Carbon\Carbon::parse($item->create_at)->format('d M Y') }}</time>
                                            </div>
                                        </div><!-- End recent post item-->
                                    @endforeach
                                @endif

                            </div><!--/Recent Posts Widget -->

                            <!-- Tags Widget -->
                            <div class="tags-widget widget-item">

                                <h3 class="widget-title">Tags</h3>
                                <ul>
                                    @if ($subcategory->isNotEmpty())
                                        @foreach ($subcategory as $sub)
                                            <li><a
                                                    href="{{ route('frontend.template', ['subcategory' => $sub->id]) }}">{{ $sub->name }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div><!--/Tags Widget -->

                        </div>

                    </div>
                </div>
            </div>
        </main>


        <footer id="footer" class="footer">

            <div class="container footer-top">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="index.html" class="d-flex align-items-center">
                            <span class="sitename">FlexStart</span>
                        </a>
                        <div class="footer-contact pt-3">
                            <p>Palilai II</p>
                            <p>Banteay Meanchey,PP 535022</p>
                            <p class="mt-3"><strong>Phone:</strong> <span>+855 90 425 397</span></p>
                            <p><strong>Email:</strong> <span>info@example.com</span></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <h4>Follow Us</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links d-flex">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>

        </footer>


        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ url('assets_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url('assets_frontend/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ url('assets_frontend/vendor/aos/aos.js') }}"></script>
        <script src="{{ url('assets_frontend/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ url('assets_frontend/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ url('assets_frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ url('assets_frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ url('assets_frontend/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ url('assets_frontend/modules/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ url('assets_frontend/modules/codemirror/lib/codemirror.js') }}"></script>
        <script src="{{ url('assets_frontend/modules/codemirror/mode/javascript/javascript.js') }}"></script>
        {{-- library of text editor like microsoft word --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
            integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        {{-- library of text editor like microsoft word --}}
        <!-- Main JS File -->
        <script src="{{ url('assets_frontend/js/main.js') }}"></script>
        <script>
            $('.textarea').trumbowyg();
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </body>

</blog>
