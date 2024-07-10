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
            <h2 class="section-title">Form Laravel</h2>
            <p class="section-lead">
                Form Laravel using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('template.laravel.update', $laravel->id) }}"
                            id="LaravelFormUpdate" name="LaravelFormUpdate" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Update Laravel</h4>
                                <a href="{{ route('template.laravel.view') }}" class="btn btn-primary btn-sm">Go Back</a>
                            </div>
                            <div class="row">
                                <div class="card-body col-6 col-lg-6 col-md-12 ">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="form-controller">
                                            <input type="text" name="title" id="title"
                                                value="{{ $laravel->title }}" class="form-control">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <div class="form-controller">
                                            <select class="form-control selectric" name="category_id" id="category_id">
                                                <option value="">Choose category</option>
                                                @foreach ($categories as $cate)
                                                    <option value="{{ $cate->id }}"
                                                        {{ $laravel->category_id == $cate->id ? 'selected' : '' }}>
                                                        {{ $cate->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Sub Category</label>
                                        <div class="form-controller">
                                            <select class="form-control selectric" name="sub_category_id"
                                                id="sub_category_id">
                                                <option value="">Choose sub category</option>
                                                @foreach ($subcategories as $sub)
                                                    <option value="{{ $sub->id }}"
                                                        {{ $laravel->sub_category_id == $sub->id ? 'selected' : '' }}>
                                                        {{ $sub->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Image Detail</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input"
                                                    id="site-logo image image_laravel" name="image_laravel">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description image</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_header" id="description_header">{{ $laravel->description_header }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Title</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control"
                                                value="{{ $laravel->title_video_laravel }}" name="title_video_laravel"
                                                id="title_video_laravel">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Frame</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="video_laravel" id="video_laravel">{{ $laravel->video_laravel }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description Video</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_video_laravel" id="description_video_laravel">{{ $laravel->description_video_laravel }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header laravel</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control"
                                                value="{{ $laravel->header_laravel }}" name="header_laravel"
                                                id="header_laravel">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description laravel</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_one" id="description_laravel_one">{{ $laravel->description_laravel_one }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code one</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_one" id="code_one">{{ $laravel->code_one }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description laravel</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_two" id="description_laravel_two">{{ $laravel->description_laravel_two }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code two</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_two" id="code_two">{{ $laravel->code_two }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description laravel tree</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_tree" id="description_laravel_tree">{{ $laravel->description_laravel_tree }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code tree</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_tree" id="code_tree">{{ $laravel->code_tree }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description laravel four</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_four" id="description_laravel_four">{{ $laravel->description_laravel_four }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code four</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_four" id="code_four">{{ $laravel->code_four }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="card-body col-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Description laravel five</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_five" id="description_laravel_five">{{ $laravel->description_laravel_five }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code five</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_five" id="code_five">{{ $laravel->code_five }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description laravel six</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_six" id="description_laravel_six">{{ $laravel->description_laravel_six }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code six</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_six" id="code_six">{{ $laravel->code_six }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description laravel seven</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_seven" id="description_laravel_seven">{{ $laravel->description_laravel_seven }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code seven</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_seven" id="code_seven">{{ $laravel->code_seven }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description laravel eight</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_eight" id="description_laravel_eight">{{ $laravel->description_laravel_eight }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code eight</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_eight" id="code_eight">{{ $laravel->code_eight }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description laravel nine</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_nine" id="description_laravel_nine">{{ $laravel->description_laravel_nine }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code nine</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_nine" id="code_nine">{{ $laravel->code_nine }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description laravel ten</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_laravel_ten" id="description_laravel_ten">{{ $laravel->description_laravel_ten }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code ten</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_ten" id="code_ten">{{ $laravel->code_ten }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Description</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="last_description" id="last_description">{{ $laravel->last_description }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" value="{{ $laravel->keywords }}"
                                                name="keywords" id="keywords">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>GitHub Link</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control"
                                                value="{{ $laravel->github_link }}" name="github_link" id="github_link">
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
        $("#LaravelFormUpdate").submit(function(e) {
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
                        window.location.href = "{{ route('template.laravel.view') }}";

                    }
                }
            });
        });
    </script>
@endsection
