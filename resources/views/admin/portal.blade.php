<!DOCTYPE html>
<html lang="en">

<head>
    <title>Akuratcenter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="author" content="PT Paiton Operation & Maintenance Indonesia">
    <meta name="publisher" content="PT Paiton Operation & Maintenance Indonesia">
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <link href="{{ asset('assets/plugins/custom/font/font.css?family=Poppins:300,400,500,600,700') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet">
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="background: linear-gradient(135deg, #e8e9e9 0%, #e1e8ee 100%);">
    <div class="d-flex flex-column flex-root">
        <!-- Background and Centered Container -->
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url({{ asset('assets/media/illustrations/14.png') }})">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <!-- Login Form Container -->
                <div class="bg-body d-flex flex-column flex-center w-md-550px p-10 rounded-3 shadow">
                    <a href="#" class="mb-4">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo.png') }}" class="w-150px" />
                    </a>
                    <div class="d-flex flex-center flex-column align-items-stretch w-md-500px">
                        <div class="text-center mb-5">
                            <p class="text-muted fs-4 mb-3">Login Aplikasi</p>
                        </div>
                        <form class="form w-100" id="kt_sign_in_form" method="POST" action="{{ route('admin.auth_login') }}">
                            @csrf
                            @include('errors.alert')
                            <div class="fv-row mb-5">
                                <label class="form-label fs-sm-8 fs-lg-6 fs-xl-6 fw-bolder text-dark">Username</label>
                                <input class="form-control form-control-sm form-control-lg" type="text"
                                    name="username" value="{{ old('username') }}" required />
                            </div>
                            <div class="fv-row mb-5">
                                <label class="form-label fw-bolder text-dark fs-sm-8 fs-lg-6 fs-xl-6">Password</label>
                                <input class="form-control form-control-sm form-control-lg" type="password"
                                    name="password" required />
                            </div>
                            <div class="text-center mb-5">
                                <button type="submit" id="kt_sign_in_submit"
                                    class="btn btn-sm fs-sm-8 fs-lg-6 fs-xl-6 btn-primary w-100 py-3">
                                    <span class="indicator-label">Login</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/plugins/global/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script defer>
        localStorage.clear();
        sessionStorage.clear();
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 500);
    </script>
</body>

</html>
