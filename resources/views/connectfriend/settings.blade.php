@extends('layout.master')

@section('content')
<br><br><br><br>
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">
            <h2>@lang('connectfriend.settings')</h2>
        </div>
        <div class="col-1">

        </div>
    </div>
    <div class="row">
    <div class="col-md-6 d-flex justify-content-center">
        @if (!$user->isVisible)
            <img src="{{asset($user->bear->image)}}" 
            width="475" height="400">
        @else
            @if ($user->avatar_id != null)
                <img src="{{asset($user->avatar->avatar)}}" 
                width="475" height="400">
            @else
                <img src="{{ $user->image ? asset('uploads/' . $user->image) : asset('img/profile.jpg') }}" 
                width="475" height="400">
            @endif
        @endif    
        </div>
        <div class="col-md-5">
            <h2>{{$user->name}}</h2>
            <div class="my-2 d-flex align-items-center">
                <img src="{{ asset('img/coin.jpg') }}" class="rounded-circle me-2" width="35" height="auto">
                <h4 class="card-text text-justify" >@lang('connectfriend.coin'): {{$user->coin}}</h4>
            </div>
            <div class="d-flex my-3">
                <a href="" class="btn btn-primary w-100"  data-bs-toggle="modal" data-bs-target="#topupModal">@lang('connectfriend.topup')</a>
            </div>
            <div class="my-4 d-flex align-items-center">
                <img src="{{ asset('img/settings.png') }}" class="rounded-circle me-2" width="35" height="auto">
                <h4 class="card-text text-justify">@lang('connectfriend.visible'): 
                @if ($user->isVisible)
                    @lang('connectfriend.on')
                @else
                    @lang('connectfriend.off')
                @endif
                </h4>
                <a class="ms-2" href="" style="color:#92a7a2 ;" data-bs-toggle="modal" data-bs-target="#visibleModal">
                    <h5>@lang('connectfriend.change')</h5>
                </a>
            </div>
        </div>
        <div class="col-md-1">

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
    }.btn-outline-primary:hover {
        background-color: white; 
        color: #92a7a2; 
        border-color: #92a7a2; 
    }
    .btn-outline-primary {
        background-color: white; 
        color: black; 
        border-color: black; 
    }
</style>

<!-- Modal -->
<div class="modal fade" id="topupModal" tabindex="-1" aria-labelledby="topupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topupModalLabel">@lang('connectfriend.topup') (minimal 100)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadForm" method="POST" action="{{ route('topup') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="topup" class="form-label">@lang('connectfriend.amount2')</label>
                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-outline-primary me-2" id="decrementButton">-</button>
                            <input type="number" id="topup" name="topup" class="form-control text-center" 
                                   value="100" min="0" step="100" style="width: 100px;" >
                            <button type="button" class="btn btn-outline-primary ms-2" id="incrementButton">+</button>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('connectfriend.cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('connectfriend.topup2')</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const topup = document.getElementById('topup');
        const incrementButton = document.getElementById('incrementButton');
        const decrementButton = document.getElementById('decrementButton');

        incrementButton.addEventListener('click', function () {
            let currentValue = parseInt(topup.value);
            topup.value = currentValue + 100;
        });
        decrementButton.addEventListener('click', function () {
            let currentValue = parseInt(topup.value);
            if (currentValue > 100) { 
                topup.value = currentValue - 100;
            }
        });
    });
</script>

<!-- Modal 2 -->
<div class="modal fade" id="visibleModal" tabindex="-1" aria-labelledby="visibleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visibleModalLabel">@lang('connectfriend.are_sure')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadForm" method="POST" action="{{ route('change_visible') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <h6>@lang('connectfriend.when_on')</h6>
                        <h6>@lang('connectfriend.when_off')</h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('connectfriend.cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('connectfriend.yes')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection