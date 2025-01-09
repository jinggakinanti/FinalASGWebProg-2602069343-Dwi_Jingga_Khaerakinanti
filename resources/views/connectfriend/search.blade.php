@extends('layout.master')

@section('content')
<br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">
            <h2>@lang('connectfriend.result') "{{ $query }}"</h2>
        </div>
        <div class="col-1">

        </div>
    </div>
</div>
<div class="container px-5 my-2">
    <div class="px-5">
        <div class="row px-5">
            @if ($users->isEmpty())
                <div class="col-12 text-center">
                    <h5>--@lang('connectfriend.no')--</h5>
                </div>
            @else
            @foreach ($users as $user)
                <!-- User Card -->
                <div class="col-3 d-flex justify-content-center mb-4">
                    <a href="{{route('detail.page', ['id' => $user->id])}}" class="text-decoration-none text-black">
                        <div class="card" style="width: 15rem; height: 17rem; ">
                            @if ($user->avatar_id != null)
                                <img src="{{asset($user->avatar->avatar)}}" 
                                class="card-img-top rounded-circle d-block mx-auto my-2" style="width: 100px; height: 100px; object-fit: cover; "  alt="User Profile Image">
                            @else
                                <img src="{{ $user->image ? asset('uploads/' . $user->image) : asset('img/profile.jpg') }}" 
                                class="card-img-top rounded-circle d-block mx-auto my-2" style="width: 100px; height: 100px; object-fit: cover; "  alt="User Profile Image">
                            @endif
                            <hr style="border: 1px solid #92a7a2; margin: 0;"/>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title text-center">{{ $user->name }}</h5>
                                    <p class="card-text text-center">{{ $user->profession }}</p>
                                </div>
                                
                                <div class="d-flex align-items-start">
                                <img src="{{ asset('img/briefcase.png') }}" class="rounded-circle" width="35" height="auto">
                                    <p class="card-text text-justify" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        @foreach ($user->fields as $field)
                                            {{ $field->field }}@if(!$loop->last), @endif
                                        @endforeach
                                    </p>
                                </div>    
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection