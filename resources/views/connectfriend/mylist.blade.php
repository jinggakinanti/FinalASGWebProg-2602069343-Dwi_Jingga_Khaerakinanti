@extends('layout.master')

@section('content')
<br><br><br><br>
<div class="container-fluid">
    <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6 d-flex justify-content-center">
                <h2>@lang('connectfriend.my_friend')</h2>
            </div>
            <div class="col-3">
                
            </div>
        </div>
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6 d-flex flex-column align-items-center">
                @if (!$user->isVisible)
                    <img src="{{asset($user->bear->image)}}" 
                    width="150" height="auto" class="rounded-circle my-1">
                @else
                    @if ($user->avatar_id!= null)
                        <img src="{{asset($user->avatar->avatar)}}" 
                        width="150" height="auto" class="rounded-circle my-1">
                    @else
                        <img src="{{ $user->image ? asset('uploads/' . $user->image) : asset('img/profile.jpg') }}" 
                        width="150" height="auto" class="rounded-circle my-1">
                    @endif
                @endif
            </div>
            <div class="col-3">
                
            </div>
        </div>
        <div class="container px-5 my-2">
    <div class="px-5">
        <div class="row px-5">
            @foreach ($friends as $friend)
                <!-- User Card -->
                <div class="col-3 d-flex justify-content-center mb-4">
                    <a href="{{route('detail.page', ['id' => $friend->id])}}" class="text-decoration-none text-black">
                        <div class="card" style="width: 15rem; height: 17rem; ">
                            @if (!$friend->isVisible)
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
                            
                            <a href="{{route('my_list.page')}}" class="text-center" style="color:#92a7a2 ;" data-bs-toggle="modal" data-bs-target="#removeModal{{ $friend->id }}">
                                <h6>@lang('connectfriend.remove')</h6>
                            </a>
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
                <!-- Modal -->
                <div class="modal fade" id="removeModal{{ $friend->id }}" tabindex="-1" aria-labelledby="removeModalLabel{{ $friend->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="removeModalLabel{{ $friend->id }}">@lang('connectfriend.remove')</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="uploadForm" method="POST" action="{{ route('remove_friend', ['id' => $friend->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="removeFriend" class="form-label">@lang('connectfriend.remove2') {{$friend->name}} @lang('connectfriend.remove3')</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('connectfriend.cancel')</button>
                                <button type="submit" class="btn btn-primary">@lang('connectfriend.remove')</button>
                            </div>
                            </form>
                        </div>
                    </div>
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
        border-color: #f5ebeb; 
        }
        .btn-secondary {
        background-color: black; 
        color: white; 
        border-color: white; 
        }
        .btn-secondary:hover {
        background-color: white; 
        color: black; 
        border-color: black; 
        }
</style>
@endsection