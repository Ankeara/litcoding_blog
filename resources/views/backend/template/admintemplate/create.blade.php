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
            <h2 class="section-title">Form Admin template</h2>
            <p class="section-lead">
                Form Admin template using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('template.admintemplate.save') }}" id="admintemplateForm"
                            name="admintemplateForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Create Admin template</h4>
                                <a href="{{ route('template.admintemplate.view') }}" class="btn btn-primary btn-sm">Go
                                    Back</a>
                            </div>
                            <div class="row">
                                <div class="card-body col-6 col-lg-6 col-md-12 ">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="form-controller">
                                            <input type="text" name="title" id="title" class="form-control">
                                            <p class="text-danger" id="title-warning" style="display:none;">Please
                                                enter title project</p>
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
                                                    id="site-logo image image_admintemplate" name="image_admintemplate">
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
                                            <input type="text" class="form-control" name="title_video_admintemplate"
                                                id="title_video_admintemplate">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Frame</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="video_admintemplate" id="video_admintemplate"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description Video</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_video_admintemplate" id="description_video_admintemplate"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header Admin template</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_admintemplate"
                                                id="header_admintemplate">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description Admin template one</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_admintemplate_one" id="description_admintemplate_one"></textarea>
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
                                        <label>Description Admin template two</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_admintemplate_two" id="description_admintemplate_two"></textarea>
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

                                </div>
                                <div class="card-body col-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Description Admin template tree</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_admintemplate_tree" id="description_admintemplate_tree"></textarea>
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
                                        <label>Description Admin template four</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_admintemplate_four" id="description_admintemplate_four"></textarea>
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
                                    <div class="form-group">
                                        <label>Description Admin template five</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_admintemplate_five" id="description_admintemplate_five"></textarea>
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
                                            <p class="text-danger" id="github_link-warning" style="display:none;">Please
                                                enter GitHub link</p>
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
        $("#admintemplateForm").submit(function(e) {
            e.preventDefault();

            // Hide previous warnings
            $('#category-warning').hide();
            $('#subcategory-warning').hide();
            $('#title-warning').hide();
            $('#github_link-warning').hide();

            let category_id = $('#category_id').val();
            let sub_category_id = $('#sub_category_id').val();
            let title = $('#title').val();
            let github_link = $('#github_link').val();
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

            // Check if title is selected
            if (!title) {
                $('#title-warning').show();
                isValid = false;
            }

            // Check if github_link is selected
            if (!github_link) {
                $('#github_link-warning').show();
                isValid = false;
            }

            // Submit the form if valid
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
                            window.location.href = "{{ route('template.html.view') }}";
                        }
                    }
                });
            }
        });
    </script>
@endsection
