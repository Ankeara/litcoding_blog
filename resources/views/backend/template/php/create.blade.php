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
            <h2 class="section-title">Form PHP</h2>
            <p class="section-lead">
                Form PHP using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('template.php.save') }}" id="phpForm" name="phpForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Create php</h4>
                                <a href="{{ route('template.php.view') }}" class="btn btn-primary btn-sm">Go Back</a>
                            </div>
                            <div class="row">
                                <div class="card-body col-6 col-lg-6 col-md-12 ">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="form-controller">
                                            <input type="text" name="title" id="title" class="form-control">
                                            <p></p>
                                        </div>
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
                                                    id="site-logo image image_php" name="image_php">
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
                                            <input type="text" class="form-control" name="title_video_php"
                                                id="title_video_php">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Frame</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="video_php" id="video_php"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description Video</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_video_php" id="description_video_php"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header PHP</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_php" id="header_php">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description PHP one</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_one" id="description_php_one"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code one</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_one" id="code_one"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description PHP two</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_two" id="description_php_two"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code two</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_two" id="code_two"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description PHP tree</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_tree" id="description_php_tree"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code tree</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_tree" id="code_tree"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description PHP four</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_four" id="description_php_four"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code four</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_four" id="code_four"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="card-body col-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Description PHP five</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_five" id="description_php_five"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code five</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_five" id="code_five"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description PHP six</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_six" id="description_php_six"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code six</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_six" id="code_six"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description PHP seven</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_seven" id="description_php_seven"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code seven</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_seven" id="code_seven"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description PHP eight</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_eight" id="description_php_eight"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code eight</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_eight" id="code_eight"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description PHP nine</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_nine" id="description_php_nine"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code nine</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_nine" id="code_nine"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description PHP ten</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_php_ten" id="description_php_ten"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code ten</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_ten" id="code_ten"></textarea>
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
        $("#phpForm").submit(function(e) {
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

                            window.location.href = "{{ route('template.php.view') }}";
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
                            if (errors.header_php) {
                                $('#header_php').addClass("is-invalid").siblings('p').addClass(
                                        "invalid-feedback")
                                    .html(errors.header_php)
                            } else {
                                $('#header_php').removeClass("is-invalid").siblings('p').removeClass(
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
