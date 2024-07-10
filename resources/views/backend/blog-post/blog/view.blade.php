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
                <div class="breadcrumb-item"><a href="#">Template</a></div>
                <div class="breadcrumb-item">View</div>
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
                        @include('message')
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4>View Table blog</h4>
                            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">Create</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Creator</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @if ($blogs->isNotEmpty())
                                        @foreach ($blogs as $bg)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $bg->user->name }}</td>
                                                <td>{{ $bg->name }}</td>
                                                <td><img src="{{ url('/default/blogs/' . $bg->image) }}"
                                                        style="width:50px; height:50px; object-fit:contain;" alt="">
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($bg->created_at)->format('d M Y') }}</td>
                                                <td>
                                                    @if ($bg->status == 1)
                                                        <div class="badge badge-success">Active</div>
                                                    @else
                                                        <div class="badge badge-danger">Not Active</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown d-inline">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton2" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item has-icon" href="#"><i
                                                                    class="far fa-file"></i> Detail</a>
                                                            <a class="dropdown-item has-icon"
                                                                href="{{ route('admin.blog.edit', $bg->id) }}"><i
                                                                    class="fas fa-pencil-alt"></i> Update</a>
                                                            <a class="dropdown-item has-icon" href="#"
                                                                onclick="deleteBg('{{ $bg->id }}')"><i
                                                                    class="fas fa-trash"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            {{-- {{ $blogs->links('pagination::bootstrap-5') }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Delete blog Modal -->
    <div class="modal fade" id="deleteBgModal" tabindex="-1" aria-labelledby="deleteBgModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteBgModalLabel">Confirm Delete</h5>
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Blog?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBgBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customJS')
    <script>
        function deleteBg(bgid) {
            // Set the job id in the modal
            $('#deleteBgModal').data('bgid', bgid);
            // Show the modal
            $('#deleteBgModal').modal('show');
        }

        // Handle deletion confirmation in the modal
        $('#confirmDeleteBgBtn').click(function() {
            var bgid = $('#deleteBgModal').data('bgid');
            // Send an AJAX request to delete the job
            $.ajax({
                url: '/admin/blog/delete/' + bgid,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = "{{ url()->current() }}";
                    }
                }
            });
            // Hide the modal
            $('#deleteBgModal').modal('hide');
        });
    </script>
@endsection
