<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Zainik Task</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{url('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{url('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{url('assets/img/favicon.ico')}}" />
    <style>
        .body {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body class="body">
    <div class="container mt-5 text-center">
        @if(Auth::guard('admin')->check())
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary w-25 mb-3">Admin Dashboard</a> <br>
        @elseif(Auth::guard('customer')->check())
        <a href="{{ route('customer.dashboard') }}" class="btn btn-secondary w-25">Customer Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="btn btn-primary w-25 mb-3">Login</a> <br>
        <a href="{{ route('register') }}" class="btn btn-secondary w-25">Register</a>
        @endif

    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>