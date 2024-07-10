@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>Error!</strong> {{ Session::get('error') }}
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

@if (Session::has('success'))
    <div class="alert alert-primary alert-dismissible fade show">
        <strong>Success!</strong> {{ Session::get('success') }}
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info alert-dismissible fade show">
        <strong>Information</strong> {{ Session::get('info') }}
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

<script>
    $("#toastr-1").click(function() {
        iziToast.info({
            title: 'Hello, world!',
            message: 'This awesome plugin is made iziToast toastr',
            position: 'topRight'
        });
    });

    $("#toastr-2").click(function() {
        iziToast.success({
            title: 'Hello, world!',
            message: 'This awesome plugin is made by iziToast',
            position: 'topRight'
        });
    });

    $("#toastr-3").click(function() {
        iziToast.warning({
            title: 'Hello, world!',
            message: 'This awesome plugin is made by iziToast',
            position: 'topRight'
        });
    });

    $("#toastr-4").click(function() {
        iziToast.error({
            title: 'Hello, world!',
            message: 'This awesome plugin is made by iziToast',
            position: 'topRight'
        });
    });
</script>
