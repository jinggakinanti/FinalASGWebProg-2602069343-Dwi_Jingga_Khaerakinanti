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
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">@lang('connectfriend.payment')</div>

                <div class="card-body">
                    <h6>@lang('connectfriend.fee'): @lang('connectfriend.rp') 100.0000</h6>
                    <form method="POST" action="{{ route('fee_process') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="amount" class="col-md-4 col-form-label text-md-end">@lang('connectfriend.amount')</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if(session('overpaid'))
                                    <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                    let overModal = new bootstrap.Modal(document.getElementById('overModal'));
                                    overModal.show();
                                    });
                                    </script>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('connectfriend.pay')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>
    body{
        background-color: #eea885;
    }
    .btn-primary {
        background-color: #b27b62; 
        color: black; 
        border-color: black; 
        }

        .btn-primary:hover {
        background-color: #f5ebeb; 
        color: black; 
        border-color: #f5ebeb; 
        }
        .btn-secondary {
        background-color: #f5ebeb; 
        color: black; 
        border-color: black; 
        }

        .btn-secondary:hover {
        background-color: #b27b62; 
        color: black; 
        border-color: #b27b62; 
        }
</style>

<!-- Modal -->
<div class="modal fade" id="overModal" tabindex="-1" aria-labelledby="overModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="overModalLabel">@lang('connectfriend.overpaid'): @lang('connectfriend.rp') {{number_format(session('overpaid'), 0, ',', '.')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <h5>@lang('connectfriend.would')</h5>   
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('convert') }}">
                        @csrf
                        <input type="hidden" name="coins" value="{{ session('overpaid') }}">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">@lang('connectfriend.convert')</button>
                    </form>
                    <a href="{{route('register_payment.page')}}">
                    <button type="submit" class="btn btn-secondary">@lang('connectfriend.reenter')</button>
                    </a>
                </div>
        </div>
    </div>
</div>
</html>