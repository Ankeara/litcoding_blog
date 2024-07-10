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
                <div class="breadcrumb-item"><a href="#">Blog</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form blog</h2>
            <p class="section-lead">
                Form blog using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('blog-post.blog.save') }}" id="blogForm" name="blogForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Create blog</h4>
                                <a href="{{ route('blog-post.blog.view') }}" class="btn btn-primary btn-sm">Go Back</a>
                            </div>
                            <div class="row">
                                <div class="card-body col-6 col-lg-6 col-md-12 ">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <div class="form-controller">
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image Blog</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description image</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="detail_this_template" id="detail_this_template"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header one</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_one" id="header_one">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image one</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_one">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description one</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_one" id="description_one"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header two</label>
                                        <div class="form-controller">
                                            <input type="text" name="header_two" id="header_two" class="form-control">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image two</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_two">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description two</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_two" id="description_two"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header tree</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_tree" id="header_tree">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image tree</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_tree">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description tree</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_tree" id="description_tree"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header four</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_four"
                                                id="header_four">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image four</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_four">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description four</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_four" id="description_four"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header five</label>
                                        <div class="form-controller">
                                            <input type="text" name="header_five" id="header_five"
                                                class="form-control">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image five</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_five">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description five</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_five" id="description_five"></textarea>
                                        </div>
                                        <p></p>
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
                                <div class="card-body col-6 col-lg-6 col-md-12 ">

                                    <div class="form-group">
                                        <label>Header five</label>
                                        <div class="form-controller">
                                            <input type="text" name="header_five" id="header_five"
                                                class="form-control">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image five</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_five">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description five</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_five" id="description_five"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header six</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_six"
                                                id="header_six">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image six</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_six">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description six</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_six" id="description_six"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header seven</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_seven"
                                                id="header_seven">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image seven</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_seven">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description seven</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_seven" id="description_seven"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header eight</label>
                                        <div class="form-controller">
                                            <input type="text" name="header_eight" id="header_eight"
                                                class="form-control">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image eight</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_eight">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description eight</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_eight" id="description_eight"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header nine</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_nine"
                                                id="header_nine">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image nine</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_nine">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description nine</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_nine" id="description_nine"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Header ten</label>
                                        <div class="form-controller">
                                            <input type="text" class="form-control" name="header_ten"
                                                id="header_ten">
                                        </div>
                                        <p></p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image ten</label>
                                        <div class="form-controller">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="site-logo image"
                                                    name="image_ten">
                                                <label class="custom-file-label">Choose File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description ten</label>
                                        <div class="form-controller">
                                            <textarea class="textarea" name="description_ten" id="description_ten"></textarea>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        $("#blogForm").submit(function(e) {
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
                        window.location.href = "{{ route('blog-post.blog.view') }}";
                    }
                }
            });
        });
    </script>
@endsection
