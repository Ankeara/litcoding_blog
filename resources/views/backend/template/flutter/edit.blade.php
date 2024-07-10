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
            <h2 class="section-title">Form Flutter</h2>
            <p class="section-lead">
                Form Flutter using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('template.flutter.update', $flutter->id) }}" id="jsFormUpdate"
                            name="jsFormUpdate" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Update Flutter</h4>
                                <a href="{{ route('template.flutter.view') }}" class="btn btn-primary btn-sm">Go Back</a>
                            </div>
                            <div class="row">
                                <div class="card-body col-6 col-lg-6 col-md-12 ">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="form-controller">
                                            <input type="text" name="title" id="title"
                                                value="{{ $flutter->title }}" class="form-control">
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
                                                        {{ $flutter->category_id == $cate->id ? 'selected' : '' }}>
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
                                                        {{ $flutter->sub_category_id == $sub->id ? 'selected' : '' }}>
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
                                                    id="site-logo image image_flutter" name="image_flutter">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description image</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_header" id="description_header">{{ $flutter->description_header }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Title</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control"
                                                value="{{ $flutter->title_video_flutter }}" name="title_video_flutter"
                                                id="title_video_flutter">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Frame</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="video_flutter" id="video_flutter">{{ $flutter->video_flutter }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description Video</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_video_flutter" id="description_video_flutter">{{ $flutter->description_video_flutter }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header flutter</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control"
                                                value="{{ $flutter->header_flutter }}" name="header_flutter"
                                                id="header_flutter">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description flutter</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_one" id="description_flutter_one">{{ $flutter->description_flutter_one }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code one</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_one" id="code_one">{{ $flutter->description_flutter_two }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description flutter</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_two" id="description_flutter_two">{{ $flutter->description_flutter_two }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code two</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_two" id="code_two">{{ $flutter->code_two }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description flutter tree</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_tree" id="description_flutter_tree">{{ $flutter->description_flutter_tree }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code tree</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_tree" id="code_tree">{{ $flutter->code_tree }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description flutter four</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_four" id="description_flutter_four">{{ $flutter->description_flutter_four }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code four</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_four" id="code_four">{{ $flutter->code_four }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="card-body col-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Description flutter five</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_five" id="description_flutter_five">{{ $flutter->description_flutter_five }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code five</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_five" id="code_five">{{ $flutter->code_five }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description flutter six</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_six" id="description_flutter_six">{{ $flutter->description_flutter_six }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code six</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_six" id="code_six">{{ $flutter->code_six }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description flutter seven</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_seven" id="description_flutter_seven">{{ $flutter->description_flutter_seven }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code seven</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_seven" id="code_seven">{{ $flutter->code_seven }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description flutter eight</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_eight" id="description_flutter_eight">{{ $flutter->description_flutter_eight }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code eight</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_eight" id="code_eight">{{ $flutter->code_eight }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description flutter nine</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_nine" id="description_flutter_nine">{{ $flutter->description_flutter_nine }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code nine</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_nine" id="code_nine">{{ $flutter->code_nine }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description flutter ten</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_flutter_ten" id="description_flutter_ten">{{ $flutter->description_flutter_ten }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code ten</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_ten" id="code_ten">{{ $flutter->code_ten }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Description</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="last_description" id="last_description">{{ $flutter->last_description }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" value="{{ $flutter->keywords }}"
                                                name="keywords" id="keywords">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>GitHub Link</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control"
                                                value="{{ $flutter->github_link }}" name="github_link" id="github_link">
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
        $("#jsFormUpdate").submit(function(e) {
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
                        window.location.href = "{{ route('template.flutter.view') }}";

                    }
                }
            });
        });
    </script>
@endsection
