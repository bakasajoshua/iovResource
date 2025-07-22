<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Muzik - Responsive Bootstrap 4 Admin Dashboard Template</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('admin-css/bootstrap.min.css') }}">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="{{ asset('admin-css/typography.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('admin-css/style.css') }}">
        <!-- Responsive CSS -->
        <!-- <link rel="stylesheet" href="{{ asset('admin-css/responsive.css') }} "> -->
    </head>
    <body>
        <section class="sign-in-page">
            @yield('content')
        </section>     
    </body>
</html>