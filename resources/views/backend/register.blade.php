@php
    use Carbon\Carbon;
    $currentYear = Carbon::now()->year;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; LIT CODER</title>
    <meta name='csrf-token' content="{{ csrf_token() }}" />

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('assets/modules/jquery-selectric/selectric.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ url('assets/img/lit-logo.png') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form action="" method="POST" name="registrationForm" id="registrationForm">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">User name</label>
                                        <input id="name" type="text" class="form-control" name="name">
                                        <p>
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email">
                                        <p>
                                        </p>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="password">
                                            <div id="pwindicator" class="pwindicator">
                                                <div class="bar"></div>
                                                <div class="label"></div>
                                            </div>
                                            <p></p>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Password Confirmation</label>
                                            <input id="password_confirm" type="password" class="form-control"
                                                name="password_confirm">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                        <div class="mt-5 text-muted text-center">
                                            Have an account? <a href="{{ url('/') }}">Login</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; LIT {{ $currentYear }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ url('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('assets/modules/popper.js') }}"></script>
    <script src="{{ url('assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ url('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ url('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ url('assets/js/page/auth-register.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>

    <script>
        $('#registrationForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('backend.proccessRegistation') }}",
                type: 'post',
                data: $("#registrationForm").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == false) {
                        var errors = response.errors;
                        if (errors.name) {
                            $('#name').addClass("is-invalid").siblings('p').addClass("invalid-feedback")
                                .html(errors.name)
                        } else {
                            $('#name').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                        }

                        if (errors.email) {
                            $('#email').addClass("is-invalid").siblings('p').addClass(
                                    "invalid-feedback")
                                .html(errors.email)
                        } else {
                            $('#email').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                        }
                        if (errors.password) {
                            $('#password').addClass("is-invalid").siblings('p').addClass(
                                    "invalid-feedback")
                                .html(errors.password)
                        } else {
                            $('#password').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                        }

                        if (errors.password_confirm) {
                            $('#password_confirm').addClass("is-invalid").siblings('p').addClass(
                                    "invalid-feedback")
                                .html(errors.password_confirm)
                        } else {
                            $('#password_confirm').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                        }
                    } else {
                        $('#name').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('')

                        $('#email').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('')
                        $('#password').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('')
                        $('#password_confirm').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('')
                        window.location.href = "{{ route('backend.login') }}";
                    }
                }
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>
