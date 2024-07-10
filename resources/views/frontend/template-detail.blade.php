<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Template Details - FlexStart Template</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Nanum+Gothic+Coding&display=swap"
        rel="stylesheet">
    <style>
        /* CSS */
        .button-30 {
            align-items: center;
            appearance: none;
            background-color: #FCFCFD;
            border-radius: 4px;
            border-width: 0;
            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
            box-sizing: border-box;
            color: #36395A;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .button-30:focus {
            box-shadow: #D6D6E7 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
        }

        .button-30:hover {
            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #D6D6E7 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .button-30:active {
            box-shadow: #D6D6E7 0 3px 7px inset;
            transform: translateY(2px);
        }

        .button-30 i {
            margin-right: 8px
        }

        .hidden {
            display: none;

        }

        #countdown {
            margin-top: 15px;
        }

        textarea {
            font-family: "Chakra Petch", sans-serif;
        }
    </style>
    <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Jun 02 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="blog-details-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
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
                            <p class="mb-0">website that learns and reads, PHP, Framework Laravel, How to and
                                download
                                Admin template sample source code free.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li><a href="{{ route('frontend.template') }}">Template</a></li>
                        <li class="current">Template Details</li>
                        <li class="current">
                            @if (isset($html))
                                {{ Str::words($html->title, 10) }}
                            @elseif(isset($js))
                                {{ Str::words($js->title, 10) }}
                            @elseif(isset($phpdetail))
                                {{ Str::words($phpdetail->title, 10) }}
                            @elseif(isset($laraveldetail))
                                {{ Str::words($laraveldetail->title, 10) }}
                            @elseif(isset($mysqldetail))
                                {{ Str::words($mysqldetail->title, 10) }}
                            @elseif(isset($sqlserverdetail))
                                {{ Str::words($sqlserverdetail->title, 10) }}
                            @elseif(isset($oracledetail))
                                {{ Str::words($oracledetail->title, 10) }}
                            @elseif(isset($csharpdetail))
                                {{ Str::words($csharpdetail->title, 10) }}
                            @elseif(isset($javadetail))
                                {{ Str::words($javadetail->title, 10) }}
                            @elseif(isset($flutterdetail))
                                {{ Str::words($flutterdetail->title, 10) }}
                            @elseif(isset($pythondetail))
                                {{ Str::words($pythondetail->title, 10) }}
                            @endif
                        </li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">
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
                    @if (isset($html))
                        <div class="col-lg-8">
                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/html', $html->image_html) }}" alt=""
                                                class="img-fluid">
                                        </div>

                                        <h2 class="title">{{ $html->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $html->user->name }}</a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($html->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($html->description_header) !!}
                                            </p>
                                            <h3>
                                                {!! nl2br($html->title_video_html) !!}
                                            </h3>
                                            <div class="video-container">
                                                {!! $html->video_html !!}
                                            </div>
                                            <p>
                                                {!! nl2br($html->description_video_html) !!}
                                            </p>
                                            <h3>
                                                {{ $html->header_html }}
                                            </h3>
                                            <p>
                                                {!! nl2br($html->description_html) !!}
                                            </p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $html->html_code }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($html->description_css) !!}</p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $html->css_code }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($html->description_js) !!}</p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $html->js_code }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($html->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        <!-- HTML !-->
                                        <a href="{{ route('frontend.template-download-file-html', $html->id) }}"
                                            class="button-30" role="button" id="downloadButton">
                                            <i class="fa-solid fa-download"></i> Download code file
                                        </a>
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($html->github_link))
                                            <a href="{{ $html->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>
                                </div>
                            </div><!-- /Blog Details Section -->
                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $html->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $html->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($html->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->
                        </div>
                    @elseif(isset($js))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/javascript', $js->image_js) }}" alt=""
                                                class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $js->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $js->user->name }}</a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($js->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($js->description_header) !!}
                                            </p>
                                            <h3>
                                                {!! $js->title_video_js !!}
                                            </h3>
                                            <div class="video-container">
                                                {!! $js->video_js !!}
                                            </div>
                                            <p>
                                                {!! nl2br($js->description_video_js) !!}
                                            </p>
                                            <h3>
                                                {{ $js->header_js }}
                                            </h3>
                                            <p>
                                                {!! nl2br($js->description_js_one) !!}
                                            </p>

                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required id="haha">{{ $js->html_code }}</textarea>
                                            </div>
                                            <p>{!! nl2br($js->description_css) !!}</p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $js->css_code }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($js->description_js) !!}</p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $js->js_code }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($js->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        <a href="{{ route('frontend.template-download-file-js', $js->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a>
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($js->github_link))
                                            <a href="{{ $js->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $js->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $js->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($js->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>
                    @elseif(isset($reactjs))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/reactjs', $reactjs->image_react) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $reactjs->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $reactjs->user->name }}</a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($reactjs->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($reactjs->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $reactjs->title_video_react }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $reactjs->video_react !!}
                                            </div>
                                            <p>
                                                {!! nl2br($reactjs->description_video_react) !!}
                                            </p>
                                            <h3>
                                                {{ $reactjs->header_react }}
                                            </h3>
                                            <p>
                                                {!! nl2br($reactjs->description_react_one) !!}
                                            </p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $reactjs->model_code }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($reactjs->description_react_two) !!}</p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $reactjs->controller_code }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($reactjs->description_react_tree) !!}</p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $reactjs->view_code }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($reactjs->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        {{-- <a href="{{ route('frontend.template-download-file-js', $reactjs->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a> --}}
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($reactjs->github_link))
                                            <a href="{{ $reactjs->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $reactjs->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $reactjs->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($reactjs->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>
                    @elseif(isset($phpdetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/php', $phpdetail->image_php) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $phpdetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $phpdetail->user->name }}</a></li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($phpdetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($phpdetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $phpdetail->title_video_php }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $phpdetail->video_php !!}
                                            </div>
                                            <p>
                                                @if (!empty($phpdetail->description_video_php))
                                                    {!! nl2br($phpdetail->description_video_php) !!}
                                                @endif
                                            </p>
                                            <h3>
                                                @if (!empty($phpdetail->header_php))
                                                    {{ $phpdetail->header_php }}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (!empty($phpdetail->description_php_one))
                                                    {!! nl2br($phpdetail->description_php_one) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($phpdetail->code_one))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $phpdetail->code_one }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($phpdetail->description_php_two))
                                                    {!! nl2br($phpdetail->description_php_two) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($phpdetail->code_two))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $phpdetail->code_two }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($phpdetail->description_php_tree))
                                                    {!! nl2br($phpdetail->description_php_tree) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($phpdetail->code_tree))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $phpdetail->code_tree }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($phpdetail->description_php_four))
                                                    {!! nl2br($phpdetail->description_php_four) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($phpdetail->code_four))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($phpdetail->code_four) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($phpdetail->description_php_five))
                                                    {!! nl2br($phpdetail->description_php_five) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($phpdetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $phpdetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($phpdetail->description_php_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($phpdetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $phpdetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($phpdetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        {{-- <a href="{{ route('frontend.template-download-file-js', $phpdetail->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a> --}}
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($phpdetail->github_link))
                                            <a href="{{ $phpdetail->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $phpdetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $phpdetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($phpdetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>
                        {{-- End PHP --}}

                        {{-- Start Laravel --}}
                    @elseif(isset($laraveldetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/laravel', $laraveldetail->image_laravel) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $laraveldetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $laraveldetail->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($laraveldetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($laraveldetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $laraveldetail->title_video_laravel }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $laraveldetail->video_laravel !!}
                                            </div>
                                            <p>
                                                @if (!empty($laraveldetail->description_video_laravel))
                                                    {!! nl2br($laraveldetail->description_video_laravel) !!}
                                                @endif
                                            </p>
                                            <h3>
                                                @if (!empty($laraveldetail->header_laravel))
                                                    {{ $laraveldetail->header_laravel }}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (!empty($laraveldetail->description_laravel_one))
                                                    {!! nl2br($laraveldetail->description_laravel_one) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_one))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $laraveldetail->code_one }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($laraveldetail->description_laravel_two))
                                                    {!! nl2br($laraveldetail->description_laravel_two) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_two))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $laraveldetail->code_two }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($laraveldetail->description_laravel_tree))
                                                    {!! nl2br($laraveldetail->description_laravel_tree) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_tree))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $laraveldetail->code_tree }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($laraveldetail->description_laravel_four))
                                                    {!! nl2br($laraveldetail->description_laravel_four) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_four))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($laraveldetail->code_four) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($laraveldetail->description_laravel_five))
                                                    {!! nl2br($laraveldetail->description_laravel_five) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $laraveldetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($laraveldetail->description_laravel_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $laraveldetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($laraveldetail->description_laravel_seven))
                                                    {!! nl2br($laraveldetail->description_laravel_seven) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_seven))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $laraveldetail->code_seven }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($laraveldetail->description_laravel_eight))
                                                    {!! nl2br($laraveldetail->description_laravel_eight) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_eight))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($laraveldetail->code_eight) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($laraveldetail->description_laravel_nine))
                                                    {!! nl2br($laraveldetail->description_laravel_nine) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_nine))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $laraveldetail->code_nine }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($laraveldetail->description_laravel_ten) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($laraveldetail->code_ten))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $laraveldetail->code_ten }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($laraveldetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        {{-- <a href="{{ route('frontend.template-download-file-js', $laraveldetail->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a> --}}
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($laraveldetail->github_link))
                                            <a href="{{ $laraveldetail->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $laraveldetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $laraveldetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($laraveldetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>
                        {{-- End Laravel --}}

                        {{-- Start mysql --}}
                    @elseif(isset($mysqldetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/mysql', $mysqldetail->image_mysql) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $mysqldetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $mysqldetail->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($mysqldetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($mysqldetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $mysqldetail->title_video_mysql }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $mysqldetail->video_mysql !!}
                                            </div>
                                            <p>
                                                @if (!empty($mysqldetail->description_video_mysql))
                                                    {!! nl2br($mysqldetail->description_video_mysql) !!}
                                                @endif
                                            </p>
                                            <h3>
                                                @if (!empty($mysqldetail->header_mysql))
                                                    {{ $mysqldetail->header_mysql }}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (!empty($mysqldetail->description_mysql_one))
                                                    {!! nl2br($mysqldetail->description_mysql_one) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($mysqldetail->code_one))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $mysqldetail->code_one }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($mysqldetail->description_mysql_two))
                                                    {!! nl2br($mysqldetail->description_mysql_two) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($mysqldetail->code_two))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $mysqldetail->code_two }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($mysqldetail->description_mysql_tree))
                                                    {!! nl2br($mysqldetail->description_mysql_tree) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($mysqldetail->code_tree))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $mysqldetail->code_tree }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($mysqldetail->description_mysql_four))
                                                    {!! nl2br($mysqldetail->description_mysql_four) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($mysqldetail->code_four))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($mysqldetail->code_four) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($mysqldetail->description_mysql_five))
                                                    {!! nl2br($mysqldetail->description_mysql_five) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($mysqldetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $mysqldetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($mysqldetail->description_mysql_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($mysqldetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $mysqldetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($mysqldetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        {{-- <a href="{{ route('frontend.template-download-file-js', $mysqldetail->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a> --}}
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($mysqldetail->github_link))
                                            <a href="{{ $mysqldetail->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $mysqldetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $mysqldetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($mysqldetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>
                        {{-- End mysql --}}

                        {{-- Start sqlserver --}}
                    @elseif(isset($sqlserverdetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/sqlserver', $sqlserverdetail->image_sqlserver) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $sqlserverdetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $sqlserverdetail->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($sqlserverdetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($sqlserverdetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $sqlserverdetail->title_video_sqlserver }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $sqlserverdetail->video_sqlserver !!}
                                            </div>
                                            <p>
                                                @if (!empty($sqlserverdetail->description_video_sqlserver))
                                                    {!! nl2br($sqlserverdetail->description_video_sqlserver) !!}
                                                @endif
                                            </p>
                                            <h3>
                                                @if (!empty($sqlserverdetail->header_sqlserver))
                                                    {{ $sqlserverdetail->header_sqlserver }}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (!empty($sqlserverdetail->description_sqlserver_one))
                                                    {!! nl2br($sqlserverdetail->description_sqlserver_one) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($sqlserverdetail->code_one))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $sqlserverdetail->code_one }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($sqlserverdetail->description_sqlserver_two))
                                                    {!! nl2br($sqlserverdetail->description_sqlserver_two) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($sqlserverdetail->code_two))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $sqlserverdetail->code_two }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($sqlserverdetail->description_sqlserver_tree))
                                                    {!! nl2br($sqlserverdetail->description_sqlserver_tree) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($sqlserverdetail->code_tree))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $sqlserverdetail->code_tree }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($sqlserverdetail->description_sqlserver_four))
                                                    {!! nl2br($sqlserverdetail->description_sqlserver_four) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($sqlserverdetail->code_four))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($sqlserverdetail->code_four) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($sqlserverdetail->description_sqlserver_five))
                                                    {!! nl2br($sqlserverdetail->description_sqlserver_five) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($sqlserverdetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $sqlserverdetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($sqlserverdetail->description_sqlserver_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($sqlserverdetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $sqlserverdetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($sqlserverdetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        {{-- <a href="{{ route('frontend.template-download-file-js', $sqlserverdetail->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a> --}}
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($sqlserverdetail->github_link))
                                            <a href="{{ $sqlserverdetail->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $sqlserverdetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $sqlserverdetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($sqlserverdetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>
                        {{-- End sqlserver --}}

                        {{-- Start oracle --}}
                    @elseif(isset($oracledetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/oracle', $oracledetail->image_oracle) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $oracledetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $oracledetail->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($oracledetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($oracledetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $oracledetail->title_video_oracle }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $oracledetail->video_oracle !!}
                                            </div>
                                            <p>
                                                @if (!empty($oracledetail->description_video_oracle))
                                                    {!! nl2br($oracledetail->description_video_oracle) !!}
                                                @endif
                                            </p>
                                            <h3>
                                                @if (!empty($oracledetail->header_oracle))
                                                    {{ $oracledetail->header_oracle }}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (!empty($oracledetail->description_oracle_one))
                                                    {!! nl2br($oracledetail->description_oracle_one) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($oracledetail->code_one))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $oracledetail->code_one }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($oracledetail->description_oracle_two))
                                                    {!! nl2br($oracledetail->description_oracle_two) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($oracledetail->code_two))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $oracledetail->code_two }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($oracledetail->description_oracle_tree))
                                                    {!! nl2br($oracledetail->description_oracle_tree) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($oracledetail->code_tree))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $oracledetail->code_tree }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($oracledetail->description_oracle_four))
                                                    {!! nl2br($oracledetail->description_oracle_four) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($oracledetail->code_four))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($oracledetail->code_four) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($oracledetail->description_oracle_five))
                                                    {!! nl2br($oracledetail->description_oracle_five) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($oracledetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $oracledetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($oracledetail->description_oracle_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($oracledetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $oracledetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($oracledetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        {{-- <a href="{{ route('frontend.template-download-file-js', $oracledetail->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a> --}}
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($oracledetail->github_link))
                                            <a href="{{ $oracledetail->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $oracledetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $oracledetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($oracledetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>
                        {{-- End oracle --}}

                        {{-- Start csharp --}}
                    @elseif(isset($csharpdetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/csharp', $csharpdetail->image_csharp) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $csharpdetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $csharpdetail->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($csharpdetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($csharpdetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $csharpdetail->title_video_csharp }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $csharpdetail->video_csharp !!}
                                            </div>
                                            <p>
                                                @if (!empty($csharpdetail->description_video_csharp))
                                                    {!! nl2br($csharpdetail->description_video_csharp) !!}
                                                @endif
                                            </p>
                                            <h3>
                                                @if (!empty($csharpdetail->header_csharp))
                                                    {{ $csharpdetail->header_csharp }}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (!empty($csharpdetail->description_csharp_one))
                                                    {!! nl2br($csharpdetail->description_csharp_one) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($csharpdetail->code_one))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $csharpdetail->code_one }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($csharpdetail->description_csharp_two))
                                                    {!! nl2br($csharpdetail->description_csharp_two) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($csharpdetail->code_two))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $csharpdetail->code_two }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($csharpdetail->description_csharp_tree))
                                                    {!! nl2br($csharpdetail->description_csharp_tree) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($csharpdetail->code_tree))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $csharpdetail->code_tree }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($csharpdetail->description_csharp_four))
                                                    {!! nl2br($csharpdetail->description_csharp_four) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($csharpdetail->code_four))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($csharpdetail->code_four) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($csharpdetail->description_csharp_five))
                                                    {!! nl2br($csharpdetail->description_csharp_five) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($csharpdetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $csharpdetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($csharpdetail->description_csharp_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($csharpdetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $csharpdetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($csharpdetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        {{-- <a href="{{ route('frontend.template-download-file-js', $csharpdetail->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a> --}}
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($csharpdetail->github_link))
                                            <a href="{{ $csharpdetail->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $csharpdetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $csharpdetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($csharpdetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>
                        {{-- End csharp --}}

                        {{-- Start java --}}
                    @elseif(isset($javadetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/java', $javadetail->image_java) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $javadetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $javadetail->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($javadetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($javadetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $javadetail->title_video_java }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $javadetail->video_java !!}
                                            </div>
                                            <p>
                                                @if (!empty($javadetail->description_video_java))
                                                    {!! nl2br($javadetail->description_video_java) !!}
                                                @endif
                                            </p>
                                            <h3>
                                                @if (!empty($javadetail->header_java))
                                                    {{ $javadetail->header_java }}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (!empty($javadetail->description_java_one))
                                                    {!! nl2br($javadetail->description_java_one) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($javadetail->code_one))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $javadetail->code_one }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($javadetail->description_java_two))
                                                    {!! nl2br($javadetail->description_java_two) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($javadetail->code_two))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $javadetail->code_two }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($javadetail->description_java_tree))
                                                    {!! nl2br($javadetail->description_java_tree) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($javadetail->code_tree))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $javadetail->code_tree }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($javadetail->description_java_four))
                                                    {!! nl2br($javadetail->description_java_four) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($javadetail->code_four))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($javadetail->code_four) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($javadetail->description_java_five))
                                                    {!! nl2br($javadetail->description_java_five) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($javadetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $javadetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($javadetail->description_java_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($javadetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $javadetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($javadetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        {{-- <a href="{{ route('frontend.template-download-file-js', $javadetail->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a> --}}
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($javadetail->github_link))
                                            <a href="{{ $javadetail->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $javadetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $javadetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($javadetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </section><!-- /Blog Author Section -->

                        </div>
                        {{-- End java --}}

                        {{-- Start flutter --}}
                    @elseif(isset($flutterdetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/flutter', $flutterdetail->image_flutter) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $flutterdetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="blog-details.html">{{ $flutterdetail->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($flutterdetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($flutterdetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $flutterdetail->title_video_flutter }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $flutterdetail->video_flutter !!}
                                            </div>
                                            <p>
                                                @if (!empty($flutterdetail->description_video_flutter))
                                                    {!! nl2br($flutterdetail->description_video_flutter) !!}
                                                @endif
                                            </p>
                                            <h3>
                                                @if (!empty($flutterdetail->header_flutter))
                                                    {{ $flutterdetail->header_flutter }}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (!empty($flutterdetail->description_flutter_one))
                                                    {!! nl2br($flutterdetail->description_flutter_one) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($flutterdetail->code_one))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $flutterdetail->code_one }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($flutterdetail->description_flutter_two))
                                                    {!! nl2br($flutterdetail->description_flutter_two) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($flutterdetail->code_two))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $flutterdetail->code_two }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($flutterdetail->description_flutter_tree))
                                                    {!! nl2br($flutterdetail->description_flutter_tree) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($flutterdetail->code_tree))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $flutterdetail->code_tree }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($flutterdetail->description_flutter_four))
                                                    {!! nl2br($flutterdetail->description_flutter_four) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($flutterdetail->code_four))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($flutterdetail->code_four) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($flutterdetail->description_flutter_five))
                                                    {!! nl2br($flutterdetail->description_flutter_five) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($flutterdetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $flutterdetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($flutterdetail->description_flutter_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($flutterdetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $flutterdetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($flutterdetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        {{-- <a href="{{ route('frontend.template-download-file-js', $flutterdetail->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a> --}}
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($flutterdetail->github_link))
                                            <a href="{{ $flutterdetail->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif
                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">
                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $flutterdetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $flutterdetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($flutterdetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </section><!-- /Blog Author Section -->

                        </div>
                        {{-- End flutter --}}

                        {{-- Start Python --}}
                    @elseif(isset($pythondetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/python', $pythondetail->image_python) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $pythondetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                        href="#">{{ $pythondetail->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="#"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($pythondetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($pythondetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $pythondetail->title_video_python }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $pythondetail->video_python !!}
                                            </div>
                                            <p>
                                                @if (!empty($pythondetail->description_video_python))
                                                    {!! nl2br($pythondetail->description_video_python) !!}
                                                @endif
                                            </p>
                                            <h3>
                                                @if (!empty($pythondetail->header_python))
                                                    {{ $pythondetail->header_python }}
                                                @endif
                                            </h3>
                                            <p>
                                                @if (!empty($pythondetail->description_python_one))
                                                    {!! nl2br($pythondetail->description_python_one) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_one))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $pythondetail->code_one }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($pythondetail->description_python_two))
                                                    {!! nl2br($pythondetail->description_python_two) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_two))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $pythondetail->code_two }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($pythondetail->description_python_tree))
                                                    {!! nl2br($pythondetail->description_python_tree) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_tree))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $pythondetail->code_tree }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($pythondetail->description_python_four))
                                                    {!! nl2br($pythondetail->description_python_four) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_four))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($pythondetail->code_four) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($pythondetail->description_python_five))
                                                    {!! nl2br($pythondetail->description_python_five) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $pythondetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($pythondetail->description_python_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $pythondetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($pythondetail->description_python_seven))
                                                    {!! nl2br($pythondetail->description_python_seven) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_seven))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $pythondetail->code_seven }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($pythondetail->description_python_eight))
                                                    {!! nl2br($pythondetail->description_python_eight) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_eight))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {{ $pythondetail->code_eight }}
                                            </textarea>
                                                @endif
                                            </div>
                                            <p>
                                                @if (!empty($pythondetail->description_python_nine))
                                                    {!! nl2br($pythondetail->description_python_nine) !!}
                                                @endif
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_nine))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                            {!! nl2br($pythondetail->code_nine) !!}
                                            </textarea>
                                                @endif

                                            </div>
                                            <p>
                                                @if (!empty($pythondetail->description_python_ten))
                                                    {!! nl2br($pythondetail->description_python_ten) !!}
                                                @endif

                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($pythondetail->code_ten))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $pythondetail->code_ten }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($pythondetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                        <a href="{{ route('frontend.template-download-file-js', $pythondetail->id) }}"
                                            class="button-30" role="button" id="downloadButton"><i
                                                class="fa-solid fa-download"></i>
                                            Download code file</a>
                                        <div id="countdown" class="hidden">Starting download in <span
                                                id="countdownTime">5</span> seconds...</div>
                                        @if (!empty($pythondetail->github_link))
                                            <a href="{{ $pythondetail->github_link }}" target="_blank"
                                                rel="noopener noreferrer" class="button-30" role="button"><i
                                                    class="fa-brands fa-github-alt"></i>
                                                Github Project</a>
                                        @endif
                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $pythondetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $pythondetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i
                                                        class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($pythondetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>
                        {{-- End Python --}}

                        {{-- start Linux --}}
                    @elseif(isset($linuxdetail))
                        <div class="col-lg-8">

                            <!-- Blog Details Section -->
                            <div id="blog-details" class="blog-details section">
                                <div class="container">
                                    <article class="article">
                                        <div class="post-img">
                                            <img src="{{ url('/default/linux', $linuxdetail->image_linux) }}"
                                                alt="" class="img-fluid">
                                        </div>
                                        <h2 class="title">{{ $linuxdetail->title }}</h2>
                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                                    <a href="blog-details.html">{{ $linuxdetail->user->name }}</a>
                                                </li>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                        href="blog-details.html"><time
                                                            datetime="2020-01-01"></time>{{ \Carbon\Carbon::parse($linuxdetail->created_at)->format('d M Y') }}</a>
                                                </li>
                                            </ul>
                                        </div><!-- End meta top -->

                                        <div class="content">
                                            <p>
                                                {!! nl2br($linuxdetail->description_header) !!}
                                            </p>
                                            <h3>
                                                {{ $linuxdetail->title_video_linux }}
                                            </h3>
                                            <div class="video-container">
                                                {!! $linuxdetail->video_linux !!}
                                            </div>
                                            <p>
                                                {!! nl2br($linuxdetail->description_video_linux) !!}
                                            </p>
                                            <h3>
                                                {{ $linuxdetail->header_linux }}
                                            </h3>
                                            <p>
                                                {!! nl2br($linuxdetail->description_linux_one) !!}
                                            </p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $linuxdetail->code_one }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($linuxdetail->description_linux_two) !!}</p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $linuxdetail->code_two }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($linuxdetail->description_linux_tree) !!}</p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $linuxdetail->code_tree }}
                                            </textarea>
                                            </div>
                                            <p>{!! nl2br($linuxdetail->description_linux_four) !!}</p>
                                            <div class="col-md-12">
                                                <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                    placeholder="Message" required="">
                                            {{ $linuxdetail->code_four }}
                                            </textarea>
                                            </div>
                                            <p>
                                                {!! nl2br($linuxdetail->description_linux_five) !!}
                                            </p>
                                            <div class="col-md-12">
                                                @if (!empty($linuxdetail->code_five))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $linuxdetail->code_five }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($linuxdetail->description_linux_six) !!}</p>
                                            <div class="col-md-12">
                                                @if (!empty($linuxdetail->code_six))
                                                    <textarea class="form-control bg-body-tertiary text-black" name="message" readonly rows="14"
                                                        placeholder="Message" required="">
                                                {{ $linuxdetail->code_six }}
                                                </textarea>
                                                @endif
                                            </div>
                                            <p>{!! nl2br($linuxdetail->last_description) !!}</p>

                                        </div><!-- End post content -->

                                    </article>

                                </div>
                            </div><!-- /Blog Details Section -->

                            <!-- Blog Author Section -->
                            <section id="blog-author" class="blog-author section">

                                <div class="container">
                                    <div class="author-container d-flex align-items-center">
                                        <img src="{{ url('/profile/', $linuxdetail->user->image) }}"
                                            class="rounded-circle flex-shrink-0" alt="">
                                        <div>
                                            <h4>{{ $linuxdetail->user->name }}</h4>
                                            <div class="social-links">
                                                <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
                                                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                                                <a href="https://instagram.com/#"><i
                                                        class="biu bi-instagram"></i></a>
                                            </div>
                                            <h6>
                                                {!! nl2br($linuxdetail->user->description) !!}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                            </section><!-- /Blog Author Section -->

                        </div>

                    @endif
                @endif

                <div class="col-lg-4 sidebar">

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
    @if (isset($html))
        <script>
            document.getElementById('downloadButton').addEventListener('click', function(event) {
                event.preventDefault();

                var countdownElement = document.getElementById('countdown');
                var countdownTimeElement = document.getElementById('countdownTime');
                var countdownTime = 5;

                countdownElement.classList.remove('hidden');
                countdownTimeElement.textContent = countdownTime;

                var countdownInterval = setInterval(function() {
                    countdownTime -= 1;
                    countdownTimeElement.textContent = countdownTime;

                    if (countdownTime <= 0) {
                        clearInterval(countdownInterval);
                        countdownElement.classList.add('hidden');
                        window.location.href =
                            "{{ route('frontend.template-download-file-html', $html->id) }}"; // Replace with your download URL
                    }
                }, 1000);
            });
        </script>
    @elseif(isset($js))
        <script>
            document.getElementById('downloadButton').addEventListener('click', function(event) {
                event.preventDefault();

                var countdownElement = document.getElementById('countdown');
                var countdownTimeElement = document.getElementById('countdownTime');
                var countdownTime = 5;

                countdownElement.classList.remove('hidden');
                countdownTimeElement.textContent = countdownTime;

                var countdownInterval = setInterval(function() {
                    countdownTime -= 1;
                    countdownTimeElement.textContent = countdownTime;

                    if (countdownTime <= 0) {
                        clearInterval(countdownInterval);
                        countdownElement.classList.add('hidden');
                        window.location.href =
                            "{{ route('frontend.template-download-file-js', $js->id) }}"; // Replace with your download URL
                    }
                }, 1000);
            });
        </script>
    @endif
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
