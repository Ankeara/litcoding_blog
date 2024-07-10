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
                <div class="breadcrumb-item">Update</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form HTML CSS</h2>
            <p class="section-lead">
                Form HTML CSS using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('template.html.update', $htmlcss->id) }}" id="htmlFormUpdate"
                            name="htmlFormUpdate" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Update HTML CSS</h4>
                                <a href="{{ route('template.html.view') }}" class="btn btn-primary btn-sm">Go Back</a>
                            </div>
                            <div class="row">
                                <div class="card-body col-6 col-lg-6 col-md-12 ">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" value="{{ $htmlcss->title }}" name="title" id="title"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control selectric" name="category_id" id="category_id">
                                            <option value="">Choose category</option>
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->id }}"
                                                    {{ $htmlcss->category_id == $cate->id ? 'selected' : '' }}>
                                                    {{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <select class="form-control selectric" name="sub_category_id" id="sub_category_id">
                                            <option value="">Choose sub category</option>
                                            @foreach ($subcategories as $sub)
                                                <option value="{{ $sub->id }}"
                                                    {{ $htmlcss->sub_category_id == $sub->id ? 'selected' : '' }}>
                                                    {{ $sub->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Image Detail</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="site-logo image"
                                                name="image_html">
                                            <label class="custom-file-label">Choose File</label>
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description image</label>
                                        <textarea class="textarea" name="description_header" id="description_header">{{ $htmlcss->description_header }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Title</label>
                                        <input type="text" class="form-control" value="{{ $htmlcss->title_video_html }}"
                                            name="title_video_html" id="title_video_html">
                                    </div>
                                    <div class="form-group">
                                        <label>Video Frame</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="video_html" id="video_html">{{ $htmlcss->video_html }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description Video</label>
                                        <textarea class="textarea" name="description_video_html" id="description_video_html">{{ $htmlcss->description_video_html }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Header HTML</label>
                                        <input type="text" class="form-control" value="{{ $htmlcss->header_html }}"
                                            name="header_html" id="header_html">
                                    </div>
                                    <div class="form-group">
                                        <label>Description HTML</label>
                                        <textarea class="textarea" name="description_html" id="description_html">{{ $htmlcss->description_html }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>HTML Code</label>
                                        <textarea class="codeeditor" name="html_code" id="html_code">{{ $htmlcss->html_code }}</textarea>
                                    </div>
                                </div>
                                <div class="card-body col-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Description CSS</label>
                                        <textarea class="textarea" name="description_css" id="description_css">{{ $htmlcss->description_css }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>CSS Code</label>
                                        <textarea class="codeeditor" name="css_code" id="css_code">{{ $htmlcss->css_code }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Description JavaScript</label>
                                        <textarea class="textarea" name="description_js" id="description_js">{{ $htmlcss->description_js }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>JavaScript Code</label>
                                        <textarea class="codeeditor" name="js_code" id="js_code">{{ $htmlcss->js_code }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Description</label>
                                        <textarea class="textarea" name="last_description" id="last_description">{{ $htmlcss->last_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <input type="text" value="{{ $htmlcss->keywords }}" class="form-control"
                                            name="keywords" id="keywords">
                                    </div>
                                    <div class="form-group">
                                        <label>GitHub Link</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control"
                                                value="{{ $htmlcss->github_link }}" name="github_link" id="github_link">
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
                                            <option value="1" {{ $htmlcss->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="2" {{ $htmlcss->status == 2 ? 'selected' : '' }}>Not
                                                Active</option>
                                        </select>
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
        $("#htmlFormUpdate").submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);

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
        });
    </script>
@endsection
