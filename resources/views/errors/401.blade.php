<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 - WashGo</title>
    <link rel="icon" href="{{ asset('/assets/static/images/logo/favicon.png') }}">
  <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/app.css') }}">
  <link rel="stylesheet" crossorigin href="{{ asset('/assets/compiled/css/error.css') }}">
</head>

<body>
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="error">


<div class="error-page container">
    <div class="col-md-8 col-12 offset-md-2">
        <div class="text-center">
            <img class="img-error" src="{{ asset('/assets/compiled/svg/error-401.svg') }}" alt="Unauthorized">
            <h1 class="error-title">Unauthorized</h1>
            <p class="fs-5 text-gray-600">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
            <a href="{{ route('home') }}" class="btn btn-lg btn-outline-primary mt-3">Kembali ke Beranda</a>
        </div>
    </div>
</div>


    </div>
</body>

</html>
