@extends('layout.master')

@section('content')
<br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-12" style="margin-left:120px;">
            <p>@lang('connectfriend.list')->{{$user->name}}</p>
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
        <div class="col-md-6 d-flex justify-content-between">
        @if ($friends->isEmpty())
            <h6 class="text-center">--@lang('connectfriend.no_friend')--</h6>
        @endif
        <div class="row px-1">
        @foreach ($friends as $friend)
        <div class="col-6 d-flex justify-content-center mb-2">
                    <a href="{{route('detail.page', ['id' => $friend->id])}}" class="text-decoration-none text-black">
                        <div class="card" style="width: 15rem; height: 17rem; ">
                            @if(!$friend->isVisible)
                                <img src="{{asset($friend->bear->image)}}" 
                                class="card-img-top rounded-circle d-block mx-auto my-2" style="width: 100px; height: 100px; object-fit: cover; "  alt="User Profile Image">
                            @else
                                @if ($friend->avatar_id != null)
                                    <img src="{{asset($friend->avatar->avatar)}}" 
                                class="card-img-top rounded-circle d-block mx-auto my-2" style="width: 100px; height: 100px; object-fit: cover; "  alt="User Profile Image">
                                @else
                                    <img src="{{ $friend->image ? asset('uploads/' . $friend->image) : asset('img/profile.jpg') }}" 
                                    class="card-img-top rounded-circle d-block mx-auto my-2" style="width: 100px; height: 100px; object-fit: cover; "  alt="User Profile Image">
                                @endif
                            @endif
                            <hr style="border: 1px solid #92a7a2; margin: 0;"/>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title text-center">{{ $friend->name }}</h5>
                                    <p class="card-text text-center">{{ $friend->profession }}</p>
                                </div>
                                
                                <div class="d-flex align-items-start">
                                <img src="{{ asset('img/briefcase.png') }}" class="rounded-circle" width="35" height="auto">
                                    <p class="card-text text-justify" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        @foreach ($friend->fields as $field)
                                            {{ $field->field }}@if(!$loop->last), @endif
                                        @endforeach
                                    </p>
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
@endsection