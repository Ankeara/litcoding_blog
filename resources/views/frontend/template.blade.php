<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Template - FlexStart Template</title>
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

    <!-- Main CSS File -->
    <link href="{{ url('assets_frontend/css/main.css') }}" rel="stylesheet">
    <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Jun 02 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="blog-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('frontend.home') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ url('assets/img/logo.png') }}" alt="">
                <h1 class="sitename">FlexStart</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('frontend.home') }}">Home<br></a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="{{ route('frontend.template') }}" class="active">Template</a></li>
                    <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted flex-md-shrink-0" href="index.html#about">Get Started</a>

        </div>
    </header>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Template</h1>
                            <p class="mb-0">website that learns and reads, PHP, Framework Laravel, How to and download
                                Admin template sample source code free.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="current">Template</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">

                        <div class="container">

                            <div class="row gy-5">

                                @if (
                                    $htmlcss->isNotEmpty() ||
                                        $javascript->isNotEmpty() ||
                                        $react->isNotEmpty() ||
                                        $php->isNotEmpty() ||
                                        $laravel->isNotEmpty() ||
                                        $mysql->isNotEmpty() ||
                                        $sqlserver->isNotEmpty() ||
                                        $oracle->isNotEmpty() ||
                                        $csharp->isNotEmpty() ||
                                        $java->isNotEmpty() ||
                                        $flutter->isNotEmpty() ||
                                        $python->isNotEmpty() ||
                                        $linux->isNotEmpty())

                                    {{-- Session on if it has templates or not --}}

                                    {{-- Html template --}}
                                    @if ($htmlcss->isNotEmpty())
                                        @foreach ($htmlcss as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/html/' . $item->image_html) }}"
                                                            alt="" class="img-fluid"
                                                            style="width:100%; height:300px; object-fit:cover;">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-html', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div><!-- End post list item -->
                                        @endforeach
                                    @endif

                                    {{-- Javascript template --}}
                                    @if ($javascript->isNotEmpty())
                                        @foreach ($javascript as $js)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/javascript/' . $js->image_js) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-js', $js->id) }}">{{ Str::words($js->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $js->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html">
                                                                    <tim datetime="2022-01-01">
                                                                        {{ \Carbon\Carbon::parse($js->create_at)->format('d M Y') }}
                                                                    </tim e>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div><!-- End post list item -->
                                        @endforeach
                                    @endif

                                    {{-- React Js template --}}
                                    @if ($react->isNotEmpty())
                                        @foreach ($react as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/reactjs/' . $item->image_react) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-react', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html">
                                                                    <tim datetime="2022-01-01">
                                                                        {{ \Carbon\Carbon::parse($item->create_at)->format('d M Y') }}
                                                                    </tim e>
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div><!-- End post list item -->
                                        @endforeach
                                    @endif

                                    {{-- PHP Template --}}
                                    @if ($php->isNotEmpty())
                                        @foreach ($php as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/php/' . $item->image_php) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-php', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Laravel template --}}
                                    @if ($laravel->isNotEmpty())
                                        @foreach ($laravel as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/laravel/' . $item->image_laravel) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-laravel', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- MySql template --}}
                                    @if ($mysql->isNotEmpty())
                                        @foreach ($mysql as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/mysql/' . $item->image_mysql) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-mysql', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Oracle Template --}}
                                    @if ($oracle->isNotEmpty())
                                        @foreach ($oracle as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/oracle/' . $item->image_oracle) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-oracle', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Sql Server template --}}
                                    @if ($sqlserver->isNotEmpty())
                                        @foreach ($sqlserver as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/sqlserver/' . $item->image_sqlserver) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-sqlserver', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- C# template --}}
                                    @if ($csharp->isNotEmpty())
                                        @foreach ($csharp as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/csharp/' . $item->image_csharp) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-csharp', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Java template --}}
                                    @if ($java->isNotEmpty())
                                        @foreach ($java as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/java/' . $item->image_java) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-java', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Flutter template --}}
                                    @if ($flutter->isNotEmpty())
                                        @foreach ($flutter as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/flutter/' . $item->image_flutter) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-flutter', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Python template --}}
                                    @if ($python->isNotEmpty())
                                        @foreach ($python as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/python/' . $item->image_python) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-python', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif

                                    {{-- Linux template --}}
                                    @if ($linux->isNotEmpty())
                                        @foreach ($linux as $item)
                                            <div class="col-6">
                                                <article>
                                                    <div class="post-img">
                                                        <img src="{{ url('/default/linux/' . $item->image_linux) }}"
                                                            alt="" class="img-fluid">
                                                    </div>
                                                    <h2 class="title">
                                                        <a
                                                            href="{{ route('frontend.template-detail-linux', $item->id) }}">{{ Str::words($item->title, 10) }}</a>
                                                    </h2>
                                                    <div class="meta-top">
                                                        <ul>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-person"></i> <a
                                                                    href="blog-details.html">{{ $item->user->name }}</a>
                                                            </li>
                                                            <li class="d-flex align-items-center"><i
                                                                    class="bi bi-clock"></i> <a
                                                                    href="blog-details.html"><time
                                                                        datetime="2022-01-01">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</time></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach
                                    @endif
                                @else
                                    <div class="col-12"
                                        style="display: flex;align-items:center;justify-content: center; flex-direction: column;">
                                        <img src="{{ url('/assets/img/smartphone.png') }}" alt=""
                                            class="dir">
                                        <p class="mt-3">Template not found.</p>
                                    </div>
                                @endif

                            </div><!-- End blog posts list -->
                        </div>

                    </section><!-- /Blog Posts Section -->

                    <!-- Pagination 2 Section -->
                    <section id="pagination-2" class="pagination-2 section">

                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul>
                                    {{-- {{ $htmlcss->links('pagination::bootstrap-5') }} --}}
                                </ul>
                            </div>
                        </div>

                    </section><!-- /Pagination 2 Section -->

                </div>

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

                            @if ($blog->isNotEmpty())
                                @foreach ($blog as $item)
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

    <!-- Main JS File -->
    <script src="{{ url('assets_frontend/js/main.js') }}"></script>
    @section('customJS')
        <script>
            $('#searchForm').submit(function(e) {
                e.preventDefault();

                var url = "{{ route('frontend.template') }}?";

                var keywords = $("#keywords").val();
                if (keywords != '') {
                    url += '&keywords=' + encodeURIComponent(keywords);
                }

                var category = "{{ request()->category }}";
                if (category != '') {
                    url += '&category=' + encodeURIComponent(category);
                }

                var subcategory = "{{ request()->subcategory }}";
                if (subcategory != '') {
                    url += '&subcategory=' + encodeURIComponent(subcategory);
                }

                window.location.href = url;
            });
        </script>
    @endsection
</body>

</html>
