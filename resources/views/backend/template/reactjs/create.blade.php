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
            <h1>Form Validation</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Template</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form React Js</h2>
            <p class="section-lead">
                Form React Js using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('template.reactjs.save') }}" id="reactjsForm"
                            name="reactjsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Create reactjs</h4>
                                <a href="{{ route('template.reactjs.view') }}" class="btn btn-primary btn-sm">Go Back</a>
                            </div>
                            <div class="row">
                                <div class="card-body col-6 col-lg-6 col-md-12 ">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="form-controller">
                                            <input type="text" name="title" id="title" class="form-control">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <div class="form-controller">
                                            <select class="form-control selectric" name="category_id" id="category_id">
                                                <option value="">Choose category</option>
                                                @if ($category->isNotEmpty())
                                                    @foreach ($category as $cate)
                                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <p class="text-danger" id="category-warning" style="display:none;">Please select
                                                a category</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <div class="form-controller">
                                            <select class="form-control selectric" name="sub_category_id"
                                                id="sub_category_id">
                                                <option value="">Choose sub category</option>
                                                @if ($subcategory->isNotEmpty())
                                                    @foreach ($subcategory as $sub)
                                                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <p class="text-danger" id="subcategory-warning" style="display:none;">Please
                                                select a subcategory</p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Image Detail</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input"
                                                    id="site-logo image image_react" name="image_react">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description image</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_header" id="description_header"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Title</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="title_video_react"
                                                id="title_video_react">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Frame</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="video_react" id="video_react"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description Video</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_video_react" id="description_video_react"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header React Js</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_react"
                                                id="header_react">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description React Js</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_react_one" id="description_react_one"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="card-body col-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Model Code</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="model_code" id="model_code"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description React Js</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_reaect_two" id="description_reaect_two"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Controller Code</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="controller_code" id="controller_code"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description React Js</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_reaect_tree" id="description_reaect_tree"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>View Code</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="view_code" id="view_code"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Description</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="last_description" id="last_description"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="keywords" id="keywords">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>GitHub Link</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="github_link"
                                                id="github_link">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>File download</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="download_file">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select2" name="status" id="status">
                                            <option value="1">Active</option>
                                            <option value="2">No Active</option>
                                        </select>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJS')
    <script>
        $("#reactjsForm").submit(function(e) {
            e.preventDefault();
            // Hide previous warnings
            $('#category-warning').hide();
            $('#subcategory-warning').hide();
            let category_id = $('#category_id').val();
            let sub_category_id = $('#sub_category_id').val();
            let formData = new FormData(this);
            let isValid = true;

            // Check if category is selected
            if (!category_id) {
                $('#category-warning').show();
                isValid = false;
            }

            // Check if sub category is selected
            if (!sub_category_id) {
                $('#subcategory-warning').show();
                isValid = false;
            }
            if (isValid) {
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status === true) {

                            $('#title').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                            $('#category_id').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                            $('#sub_category_id').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                            $('#image_react').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                            $('#description_header').removeClass("is-invalid").siblings('p')
                                .removeClass(
                                    "invalid-feedback")
                                .html('')
                            $('#description').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')
                            $('#company_name').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('')

                            window.location.href = "{{ route('template.reactjs.view') }}";
                        } else {
                            var errors = response.errors;
                            if (errors.title) {
                                $('#title').addClass("is-invalid").siblings('p').addClass(
                                        "invalid-feedback")
                                    .html(errors.title)
                            } else {
                                $('#title').removeClass("is-invalid").siblings('p').removeClass(
                                        "invalid-feedback")
                                    .html('')
                            }

                            if (errors.category_id) {
                                $('#category_id').addClass("is-invalid").siblings('p').addClass(
                                        "invalid-feedback")
                                    .html(errors.category_id)
                            } else {
                                $('#category_id').removeClass("is-invalid").siblings('p').removeClass(
                                        "invalid-feedback")
                                    .html('')
                            }

                            if (errors.sub_category_id) {
                                $('#sub_category_id').addClass("is-invalid").siblings('p').addClass(
                                        "invalid-feedback")
                                    .html(errors.sub_category_id)
                            } else {
                                $('#sub_category_id').removeClass("is-invalid").siblings('p')
                                    .removeClass(
                                        "invalid-feedback")
                                    .html('')
                            }

                            if (errors.jobTypes) {
                                $('#jobTypes').addClass("is-invalid").siblings('p').addClass(
                                        "invalid-feedback")
                                    .html(errors.jobTypes)
                            } else {
                                $('#jobTypes').removeClass("is-invalid").siblings('p').removeClass(
                                        "invalid-feedback")
                                    .html('')
                            }

                            if (errors.vacancy) {
                                $('#vacancy').addClass("is-invalid").siblings('p').addClass(
                                        "invalid-feedback")
                                    .html(errors.vacancy)
                            } else {
                                $('#vacancy').removeClass("is-invalid").siblings('p').removeClass(
                                        "invalid-feedback")
                                    .html('')
                            }

                            if (errors.location) {
                                $('#location').addClass("is-invalid").siblings('p').addClass(
                                        "invalid-feedback")
                                    .html(errors.location)
                            } else {
                                $('#location').removeClass("is-invalid").siblings('p').removeClass(
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
                            if (errors.company_name) {
                                $('#company_name').addClass("is-invalid").siblings('p').addClass(
                                        "invalid-feedback")
                                    .html(errors.company_name)
                            } else {
                                $('#company_name').removeClass("is-invalid").siblings('p').removeClass(
                                        "invalid-feedback")
                                    .html('')
                            }
                        }
                    }
                });
            }
        });
    </script>
@endsection
