<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a class="navbar-brand" href="" style="color:#584344 ;">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="50" height="44" class="rounded-circle">
                        </a>
                    </ul>
                </div>
            </div>
        </nav>
<br><br><br><br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <img src="{{ asset('img/success.jpg') }}" width="150" height="auto" class="rounded-circle">
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <h3>@lang('connectfriend.success')</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <h5>@lang('connectfriend.dont_forget')</h5>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <a href="{{route('home.page')}}" class="btn btn-primary">@lang('connectfriend.finish')</a>
        </div>
    </div>
</div>
</body>
<style>
    body{
        background-color: #eea885;
    }
    .btn-primary {
        background-color: #f5ebeb; 
        color: black; 
        border-color: black; 
        }

        .btn-primary:hover {
        background-color: #b27b62; 
        color: black; 
        border-color: #b27b62; 
        }
</style>

</html>