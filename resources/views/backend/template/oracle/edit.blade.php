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
            <h2 class="section-title">Form Oracle</h2>
            <p class="section-lead">
                Form Oracle using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('template.oracle.update', $oracle->id) }}"
                            id="OracleFormUpdate" name="OracleFormUpdate" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Update Oracle</h4>
                                <a href="{{ route('template.oracle.view') }}" class="btn btn-primary btn-sm">Go Back</a>
                            </div>
                            <div class="row">
                                <div class="card-body col-6 col-lg-6 col-md-12 ">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="form-controller">
                                            <input type="text" name="title" id="title" value="{{ $oracle->title }}"
                                                class="form-control">
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
                                                        {{ $oracle->category_id == $cate->id ? 'selected' : '' }}>
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
                                                        {{ $oracle->sub_category_id == $sub->id ? 'selected' : '' }}>
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
                                                    id="site-logo image image_oracle" name="image_oracle">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                            <div class="form-text text-muted">The image must have a maximum size of 1MB
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description image</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_header" id="description_header">{{ $oracle->description_header }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Title</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control"
                                                value="{{ $oracle->title_video_oracle }}" name="title_video_oracle"
                                                id="title_video_oracle">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Video Frame</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="video_oracle" id="video_oracle">{{ $oracle->video_oracle }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description Video</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_video_oracle" id="description_video_oracle">{{ $oracle->description_video_oracle }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header oracle</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" value="{{ $oracle->header_oracle }}"
                                                name="header_oracle" id="header_oracle">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description oracle</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_one" id="description_oracle_one">{{ $oracle->description_oracle_one }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code one</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_one" id="code_one">{{ $oracle->description_oracle_two }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description oracle</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_two" id="description_oracle_two">{{ $oracle->description_oracle_two }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code two</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_two" id="code_two">{{ $oracle->code_two }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description oracle tree</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_tree" id="description_oracle_tree">{{ $oracle->description_oracle_tree }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code tree</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_tree" id="code_tree">{{ $oracle->code_tree }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description oracle four</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_four" id="description_oracle_four">{{ $oracle->description_oracle_four }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code four</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_four" id="code_four">{{ $oracle->code_four }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="card-body col-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Description oracle five</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_five" id="description_oracle_five">{{ $oracle->description_oracle_five }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code five</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_five" id="code_five">{{ $oracle->code_five }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description oracle six</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_six" id="description_oracle_six">{{ $oracle->description_oracle_six }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code six</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_six" id="code_six">{{ $oracle->code_six }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description oracle seven</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_seven" id="description_oracle_seven">{{ $oracle->description_oracle_seven }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code seven</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_seven" id="code_seven">{{ $oracle->code_seven }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description oracle eight</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_eight" id="description_oracle_eight">{{ $oracle->description_oracle_eight }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code eight</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_eight" id="code_eight">{{ $oracle->code_eight }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description oracle nine</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_nine" id="description_oracle_nine">{{ $oracle->description_oracle_nine }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code nine</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_nine" id="code_nine">{{ $oracle->code_nine }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Description oracle ten</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_oracle_ten" id="description_oracle_ten">{{ $oracle->description_oracle_ten }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Code ten</label>
                                        <div class="form-controller">
                                            <textarea class="codeeditor" name="code_ten" id="code_ten">{{ $oracle->code_ten }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Description</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="last_description" id="last_description">{{ $oracle->last_description }}</textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" value="{{ $oracle->keywords }}"
                                                name="keywords" id="keywords">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>GitHub Link</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control"
                                                value="{{ $oracle->github_link }}" name="github_link" id="github_link">
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
        $("#OracleFormUpdate").submit(function(e) {
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
                        window.location.href = "{{ route('template.oracle.view') }}";

                    }
                }
            });
        });
    </script>
@endsection
