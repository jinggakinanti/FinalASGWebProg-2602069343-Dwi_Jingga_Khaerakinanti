@extends('layout.master')

@section('content')
<br><br><br><br>

<div class="container-fluid">
    <div class="row">
            <div class="col-3">

            </div>
            <div class="col-6 d-flex justify-content-center">
                <h2>@lang('connectfriend.my_profile')</h2>
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
                    @if ($user->avatar_id != null)
                        <img src="{{asset($user->avatar->avatar)}}" 
                        width="150" height="auto" class="rounded-circle my-1">
                    @else
                        <img src="{{ $user->image ? asset('uploads/' . $user->image) : asset('img/profile.jpg') }}" 
                        width="150" height="auto" class="rounded-circle my-1">
                    @endif
                @endif
                <a href="" style="color:#92a7a2 ;" data-bs-toggle="modal" data-bs-target="#uploadModal">
                    <h6>@lang('connectfriend.upload')</h6>
                </a>
                <a href="{{route('my_list.page')}}" style="color:#92a7a2 ;" >
                    <h6>@lang('connectfriend.list')</h6>
                </a>
            </div>
            <div class="col-3">
                
            </div>
        </div>
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4 d-flex flex-column justify-content-center border border-dark p-3" style="border-radius:10px;">
        
        <div class="mb-3">
            <strong>@lang('connectfriend.name'):</strong> <span>{{$user->name}}</span>
        </div>
        <div class="mb-3">
            <strong>@lang('connectfriend.gender'):</strong> 
            @if($user->gender == 'Male')
                <span>@lang('connectfriend.male')</span>
            @else
                <span>@lang('connectfriend.female')</span>
            @endif
        </div>
        <div class="mb-3">
            <strong>@lang('connectfriend.age'):</strong> <span>{{$user->age}} @lang('connectfriend.yo')</span>
        </div>
        <div class="mb-3">
            <strong>@lang('connectfriend.profession'):</strong> <span>{{$user->profession}}</span>
        </div>
        <div class="mb-3">
            <strong>@lang('connectfriend.field'):</strong> <span>
            @foreach ($user->fields as $field)
            {{ $field->field }}@if(!$loop->last), @endif
            @endforeach
            </span>
        </div>
        <div class="mb-3">
            <strong>Linkedin:</strong> <span>{{$user->linkedin}}</span>
        </div>
        <div class="mb-3">
            <strong>@lang('connectfriend.mobile'):</strong> <span>{{$user->mobile}}</span>
        </div>
        <div class="mb-3">
            <strong>@lang('connectfriend.location'):</strong> <span>{{$user->location}}</span>
        </div>
        <div class="mb-3">
            <strong>@lang('connectfriend.email'):</strong> <span >{{$user->email}}</span>
        </div>
        
    </div>
            <div class="col-4">
                
            </div>
        </div>
        <br>
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

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">@lang('connectfriend.upload2')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="uploadForm" method="POST" action="{{ route('upload_image') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">@lang('connectfriend.select')</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('connectfriend.cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('connectfriend.upload')</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection