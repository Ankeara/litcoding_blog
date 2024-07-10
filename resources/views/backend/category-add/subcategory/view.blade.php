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
            <h1>Table Validation</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Sub Category</a></div>
                <div class="breadcrumb-item">View</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Table Category</h2>
            <p class="section-lead">
                Table Category using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        @include('message')
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4>View Table Category</h4>
                            <a href="{{ route('category-add.subcategory.create') }}"
                                class="btn btn-primary btn-sm">Create</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @if ($subcategory->isNotEmpty())
                                        @foreach ($subcategory as $sub)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sub->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($sub->created_at)->format('d M Y') }}</td>
                                                <td>
                                                    <div class="badge badge-success">Active</div>
                                                </td>
                                                <td><a href="{{ route('category-add.subcategory.edit', $sub->id) }}"
                                                        class="btn btn-primary">Update</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            {{ $subcategory->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
