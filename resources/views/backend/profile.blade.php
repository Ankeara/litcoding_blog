@extends('layout.app_admin')

@section('navbar_admin')
    @include('components.navbar_admin')
@endsection
@section('sidebar_admin')
    @include('components.sidebar')
@endsection

@section('main_admin')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('backend.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            @if (!Auth::user()->image)
                                <img alt="image" src="{{ url('assets/img/avatar/avatar-1.png') }}"
                                    class="rounded-circle profile-widget-picture" data-toggle="modal"
                                    data-target="#profileModal">
                            @else
                                <img alt="image" src="{{ url('/profile/' . Auth::user()->image) }}"
                                    class="rounded-circle profile-widget-picture" data-toggle="modal"
                                    data-target="#profileModal">
                            @endif
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Blog Posts</div>
                                    <div class="profile-widget-item-value"> {{ $blogByAuthor->count() }}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Code Templates</div>
                                    <div class="profile-widget-item-value">
                                        @php
                                            $total =
                                                $htmlcssByAuthor->count() +
                                                $jsByAuthor->count() +
                                                $reactByAuthor->count() +
                                                $phpByAuthor->count() +
                                                $laravelByAuthor->count() +
                                                $mysqlByAuthor->count() +
                                                $sqlserverByAuthor->count() +
                                                $oracleByAuthor->count() +
                                                $csharpByAuthor->count() +
                                                $javaByAuthor->count() +
                                                $pythonByAuthor->count() +
                                                $flutterByAuthor->count();
                                        @endphp
                                        {{ $total }}
                                    </div>
                                </div>
                                {{-- <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Following</div>
                                    <div class="profile-widget-item-value">2,1K</div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ Auth::user()->name }} <div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> {{ Auth::user()->skill }}
                                </div>
                            </div>
                            Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a
                            fictional character but an original hero in my family, a hero for his children and for his wife.
                            So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John
                                Doe'</b>.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        @include('message')
                        <form action="{{ route('backend.updateprofile') }}" method="POST" class="needs-validation"
                            novalidate="" id="userform">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}"
                                            required="" id="name" name="name">
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}"
                                            required="" id="email" name="email">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->mobile }}"
                                            id="mobile" name="mobile">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Bio</label>
                                        <textarea id="description" name="description" class="form-control summernote-simple">{{ Auth::user()->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>My Skills</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->skill }}"
                                            id="skill" name="skill">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Facebook Account</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->link_fb }}"
                                            id="link_fb" name="link_fb">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Instragram Account</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->link_ig }}"
                                            id="link_ig" name="link_ig">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Youtube Channel</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->link_yt }}"
                                            id="link_yt" name="link_yt">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>X Account</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->link_x }}"
                                            id="link_x" name="link_x">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Telegram Account</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->link_tl }}"
                                            id="link_tl" name="link_tl">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



<!-- Modal Structure -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('backend.updateProfilePic') }}" id="profile" name="profile" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profile Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="section-title">File Browser</div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" id="image"
                            name="image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('customJS')
    <script>
        // update profile
        $("#userform").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('backend.updateprofile') }}",
                type: 'post',
                data: $("#userform").serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        $('#name').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('')

                        $('#email').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('')
                        $('#description').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('')
                        $('#mobile').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('')
                        window.location.href = "{{ route('backend.profile') }}";
                    } else {
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

                        if (errors.description) {
                            $('#description').addClass("is-invalid").siblings('p').addClass(
                                    "invalid-feedback")
                                .html(errors.description)
                        } else {
                            $('#description').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                        }

                        if (errors.mobile) {
                            $('#mobile').addClass("is-invalid").siblings('p').addClass(
                                    "invalid-feedback")
                                .html(errors.mobile)
                        } else {
                            $('#mobile').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                        }

                    }
                }
            })
        })

        $('#profile').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = "{{ route('backend.profile') }}";
                    }
                }
            });
        });
    </script>
@endsection

@section('main')
    @include('components.footer')
@endsection
