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
            <h2 class="section-title">Form HTML CSS</h2>
            <p class="section-lead">
                Form HTML CSS using default from Bootstrap 4
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        @include('message')
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4>View Table HTML CSS</h4>
                            <a href="{{ route('template.html.create') }}" class="btn btn-primary btn-sm">Create</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Creator</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @if ($htmlcss->isNotEmpty())
                                        @foreach ($htmlcss as $html)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ Str::words($html->title, 5) }}</td>
                                                <td>{{ $html->user->name }}</td>
                                                {{-- <td>{{ $html->user->name ?? 'No Creator' }}</td> --}}
                                                <td>{{ $html->category->name ?? 'No Category' }}</td>
                                                <td>{{ $html->subcategory->name ?? 'No Subcategory' }}</td>
                                                <td><img src="{{ url('/default/html/' . $html->image_html) }}"
                                                        style="width:50px; height:50px; object-fit:contain;" alt="">
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($html->created_at)->format('d M Y') }}</td>
                                                <td>
                                                    @if ($html->status == 1)
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
                                                                href="{{ route('template.html.edit', $html->id) }}"><i
                                                                    class="fas fa-pencil-alt"></i> Update</a>
                                                            <a class="dropdown-item has-icon" href="#"
                                                                onclick="deleteHtml('{{ $html->id }}')"><i
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
                            {{ $htmlcss->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Delete HTML CSS Modal -->
    <div class="modal fade" id="deleteHtmlModal" tabindex="-1" aria-labelledby="deleteHtmlModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteHtmlModalLabel">Confirm Delete</h5>
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Template?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteHtmlBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('customJS')
    <script>
        function deleteHtml(htmlid) {
            // Set the job id in the modal
            $('#deleteHtmlModal').data('htmlid', htmlid);
            // Show the modal
            $('#deleteHtmlModal').modal('show');
        }

        // Handle deletion confirmation in the modal
        $('#confirmDeleteHtmlBtn').click(function() {
            var htmlid = $('#deleteHtmlModal').data('htmlid');
            // Send an AJAX request to delete the job
            $.ajax({
                url: '/admin/html/delete/' + htmlid,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = "{{ url()->current() }}";
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting HTML CSS:', error);
                    // Handle error, show error message, etc.
                }
            });
            // Hide the modal
            $('#deleteHtmlModal').modal('hide');
        });
    </script>
@endsection
