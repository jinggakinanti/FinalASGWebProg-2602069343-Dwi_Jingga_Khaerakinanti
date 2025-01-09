@extends('layout.master')

@section('content')
<br><br><br><br>
@if (session(key: 'error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session(key: 'success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container-fluid">
<div class="container px-5 my-2">
    <div class="px-5">
        <div class="row px-5">
            <h2>@lang('connectfriend.my_avatar')</h2>
            @if ($purchasedAvatars->isEmpty())
                <h5>@lang('connectfriend.no_purchased')</h5> 
            @endif
            @foreach ($purchasedAvatars as $avatar)
                <!-- avatar Card -->
                <div class="col-3 d-flex justify-content-center mb-4">
                    <a href="" class="text-decoration-none text-black">
                        <div class="card" style="width: 15rem; height: 17rem; ">
                            <img src="{{asset($avatar->avatar)}}" 
                            class="card-img-top rounded-circle d-block mx-auto my-2" style="width: 100px; height: 100px; object-fit: cover; "  alt="User Profile Image">
                            <hr style="border: 1px solid #92a7a2; margin: 0;"/>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title text-center">{{ $avatar->name }}</h5>
                                    <p class="card-text text-center">{{ number_format($avatar->price, 0, ',', '.') }} @lang('connectfriend.coin')</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center my-2">
                                    @if (Auth::user()->avatar_id == $avatar->id)
                                        <form action="{{ route('dis_avatar', $avatar->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">@lang('connectfriend.dis')</button>
                                        </form>
                                    @else
                                        <form action="{{ route('set_avatar', $avatar->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">@lang('connectfriend.set')</button>
                                        </form>
                                    @endif
                                </div>    
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
    <div class="container px-5 my-2">
    <div class="px-5">
        <div class="row px-5">
            <h2>@lang('connectfriend.all_avatar')</h2>
            @if ($availableAvatars->isEmpty())
                <h5>@lang('connectfriend.no_available')</h5> 
            @endif
            @foreach ($availableAvatars as $avatar)
                <!-- avatar Card -->
                <div class="col-3 d-flex justify-content-center mb-4">
                    <a href="" class="text-decoration-none text-black">
                        <div class="card" style="width: 15rem; height: 17rem; ">
                            <img src="{{asset($avatar->avatar)}}" 
                            class="card-img-top rounded-circle d-block mx-auto my-2" style="width: 100px; height: 100px; object-fit: cover; "  alt="User Profile Image">
                            <hr style="border: 1px solid #92a7a2; margin: 0;"/>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title text-center">{{ $avatar->name }}</h5>
                                    <p class="card-text text-center">{{ number_format($avatar->price, 0, ',', '.') }} @lang('connectfriend.coin')</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center my-2">
                                    <form action="{{ route('buy_avatar', $avatar->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="width:100px ;">@lang('connectfriend.buy')</button>
                                    </form>
                                </div>    
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>

<style>
    .btn-primary {
        background-color: #b27b62; 
        color: black; 
        border-color: black; 
    }
    .btn-primary:hover {
        background-color: #f5ebeb; 
        color: black; 
        border-color: black; 
    }.btn-secondary {
        background-color: #f5ebeb; 
        color: black; 
        border-color: black; 
    }.btn-secondary:hover {
        background-color: #b27b62; 
        color: black; 
        border-color: #b27b62; 
    }
</style>
@endsection