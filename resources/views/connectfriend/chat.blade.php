@extends('layout.master')

@section('content')
<br><br><br><br>
<div class="container-fluid ">
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">
        <div class="card">
            <div class="d-flex align-items-center">
                @if (!$user1->isVisible)
                    <img src="{{asset($user1->bear->image)}}" 
                    class="card-img-top rounded-circle d-flex ms-5 my-2" style="width: 70px; height: 70px; object-fit: cover; "> 
                @else
                    @if ($user1->avatar_id != null)
                        <img src="{{asset($user1->avatar->avatar)}}" 
                        class="card-img-top rounded-circle d-flex ms-5 my-2" style="width: 70px; height: 70px; object-fit: cover; "> 
                    @else
                        <img src="{{ $user1->image ? asset('uploads/' . $user1->image) : asset('img/profile.jpg') }}" 
                        class="card-img-top rounded-circle d-flex ms-5 my-2" style="width: 70px; height: 70px; object-fit: cover; "> 
                    @endif
                @endif
                
                <h4 class="d-flex ms-4">{{$user1->name}}</h4>
            </div>
            <hr style="border: 1px solid #92a7a2; margin: 0;"/>
            <div class="card-body d-flex flex-column" style="max-height: 500px; min-height: 500px; overflow-y: auto;">
                @if($messages->isEmpty())
                    <h6 class="text-center">@lang('connectfriend.no_chat')</h6>
                @endif
                @foreach ($messages as $message)
                    @if ($message->user1_id == $user2->id)
                        <div class="d-flex mb-3 justify-content-end">
                            <span class="rounded-pill px-3 py-2" style="background-color:#f5ebeb ;">
                            {{ $message->message }}</span>
                        </div>
                    @elseif($message->user1_id == $user1->id)
                        <div class="d-flex mb-3 justify-content-start">
                            <span class="rounded-pill px-3 py-2" style="background-color:#92a7a2 ;">
                            {{ $message->message }}</span>
                        </div>
                    @endif
                @endforeach  
            </div>
        </div>
        <div class="card mt-2">
            <form action="{{ route('send_chat', ['id' => $user1->id]) }}" method="POST">
                @csrf
                <div class="d-flex align-items-center p-3">
                    <input type="text" name="message" class="form-control me-3" placeholder="@lang('connectfriend.type')..." required>
                    <button type="submit" style="border:none ; background:none ; ">
                        <img src="{{asset('img/send.png')}}" class="rounded-circle" width="35" height="auto">
                    </button>
                </div>
            </form>
        </div>
        </div>
        <div class="col-1">

        </div>
    </div>
</div>
@endsection
