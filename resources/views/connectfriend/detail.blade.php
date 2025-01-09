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
        <div class="col-12" style="margin-left:120px;">
            <p>@lang('connectfriend.profile')->{{$user->name}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            @if(!$user->isVisible)
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
            @if ($user->gender == 'Male')
                <h6>(@lang('connectfriend.male'), {{$user->age}})</h6>
            @else
                <h6>(@lang('connectfriend.female'), {{$user->age}})</h6>
            @endif
            
            <h5>@lang('connectfriend.working'): {{$user->profession}}</h5>
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/briefcase.png') }}" class="rounded-circle me-2" width="35" height="auto">
                <h6 class="card-text text-justify" > @lang('connectfriend.interested'): 
                @foreach ($user->fields as $field)
                    {{ $field->field }}@if(!$loop->last), @endif
                @endforeach
                </h6>
            </div> 
            <div class="my-2 d-flex align-items-center">
                <img src="{{ asset('img/location.png') }}" class="rounded-circle me-2" width="35" height="auto">
                <h6 class="card-text text-justify" >{{$user->location}}</h6>
            </div>
            <div class="my-2 d-flex align-items-center">
                <img src="{{ asset('img/linkedin.png') }}" class="rounded-circle me-2" width="35" height="auto">
                <h6 class="card-text text-justify">{{$user->linkedin}}</h6>
            </div>  
            <div class="d-flex my-3">
                <a type="submit" href="{{route('list.page', ['id' => $user->id])}}" class="btn btn-primary w-100">@lang('connectfriend.flist')</a>
            </div>
            <div class="d-flex my-3 align-items-center">
                @if (!$isFriend)
                    <a href="{{route('request_friend', ['id' => $user->id])}}">
                        <img src="{{ asset('img/thumb.png') }}" class="rounded-circle me-2" width="35" height="auto">
                    </a>
                    <h6 class="card-text text-justify">@lang('connectfriend.thumb')</h6>
                @elseif($isFriend)
                    <a href="{{route('chat.page', ['id' => $user->id])}}">
                        <img src="{{ asset('img/chat2.png') }}" class="rounded-circle me-2" width="35" height="auto">
                    </a>
                    <h6 class="card-text text-justify">@lang('connectfriend.chat_with') {{$user->name}}</h6>
                @endif       
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
    }.btn-outline-success {
        background-color: #b27b62; 
        color: black; 
        border-color: black; 
        }
        .btn-outline-success:hover {
        background-color: #f5ebeb; 
        color: black; 
        border-color: #f5ebeb; 
        }
</style>
@endsection