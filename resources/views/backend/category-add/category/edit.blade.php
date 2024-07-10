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
                <div class="breadcrumb-item"><a href="#">Category</a></div>
                <div class="breadcrumb-item">Update</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Category</h2>
            <p class="section-lead">
                Form Category using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('category-add.category.update', $category->id) }}"
                            id="categoryForm" name="categoryForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Update category</h4>
                                <a href="{{ route('category-add.category.view') }}" class="btn btn-primary btn-sm">Go
                                    Back</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" value="{{ $category->name }}" class="form-control" id="name"
                                        name="name">
                                    <p></p>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" id="image" name="image_cate">
                                    <p></p>
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
        $("#categoryForm").submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('category-add.category.update', $category->id) }}",
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status === true) {
                        $('#name').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('');
                        $('#image').removeClass("is-invalid").siblings('p').removeClass(
                                "invalid-feedback")
                            .html('');
                        window.location.href = "{{ route('category-add.category.view') }}";
                    } else {
                        var errors = response.errors;
                        if (errors.name) {
                            $('#name').addClass("is-invalid").siblings('p').addClass(
                                    "invalid-feedback")
                                .html(errors.name);
                        } else {
                            $('#name').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('');
                        }
                    }
                }
            });
        });
    </script>
@endsection
