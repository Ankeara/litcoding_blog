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
                <div class="breadcrumb-item"><a href="#">Sub Category</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Form Sub Category</h2>
            <p class="section-lead">
                Form Sub Category using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="POST" action="{{ route('category-add.subcategory.save') }}" id="subcategoryForm"
                            name="subcategoryForm" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h4>Create sub category</h4>
                                <a href="{{ route('category-add.subcategory.view') }}" class="btn btn-primary btn-sm">Go
                                    Back</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sub Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
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
        $("#subcategoryForm").submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('category-add.subcategory.save') }}",
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
                        window.location.href = "{{ route('category-add.subcategory.view') }}";
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
                        if (errors.category_id) {
                            $('#category').addClass("is-invalid").siblings('p').addClass(
                                    "invalid-feedback")
                                .html(errors.category_id);
                        } else {
                            $('#category').removeClass("is-invalid").siblings('p').removeClass(
                                    "invalid-feedback")
                                .html('');
                        }
                    }
                }
            });
        });
    </script>
@endsection
