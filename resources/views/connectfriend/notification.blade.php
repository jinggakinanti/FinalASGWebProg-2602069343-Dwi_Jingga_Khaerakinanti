@extends('layout.master')

@section('content')
<br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">
            <h2>@lang('connectfriend.notification')</h2>
        </div>
        <div class="col-1">

        </div>
    </div>
    @foreach ($notifs as $notif)
    <div class="row my-2">
        <div class="col-1">

        </div>
        <div class="col-10">
        @if ($notif->type == 'chat')
        <a href="{{route('chat.page', ['id' => $notif->sender_id])}}" class="d-block text-decoration-none text-black">
            <div class="card">
                <div class="d-flex justify-content-between">
                <div class="ms-3 my-2 d-flex align-items-center">
                    <h6>@lang('connectfriend.notif_chat')</h6>
                </div>
                <div class="me-3 my-2 d-flex align-items-center">
                    <form action="{{ route('read_notif', ['id' => $notif->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            @if (!$notif->is_read)
                                <span class="badge bg-custom" style="">@lang('connectfriend.read')</span>
                            @endif
                        </button>
                    </form>
                </div>
                </div>
                <hr style="border: 1px solid #92a7a2; margin: 0;"/>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">@lang('connectfriend.notif_chat2') {{ $notif->sender->name }}</h5>
                    </div>              
                </div>
            </div>
            </a>
        @else
            <a href="{{route('detail.page', ['id' => $notif->sender_id])}}" class="d-block text-decoration-none text-black">
            <div class="card">
                <div class="d-flex justify-content-between">
                <div class="ms-3 my-2 d-flex align-items-center">
                    @if($notif->type == 'friend_request')
                        <h6>@lang('connectfriend.notif_req')</h6>
                    @elseif($notif->type == 'friend_accept')
                        <h6>@lang('connectfriend.notif_acc')</h6>
                    @endif
                </div>
                <div class="me-3 my-2 d-flex align-items-center">
                    <form action="{{ route('read_notif', ['id' => $notif->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            @if (!$notif->is_read)
                                <span class="badge bg-custom" style="">@lang('connectfriend.read')</span>
                            @endif
                        </button>
                    </form>
                </div>
                </div>
                <hr style="border: 1px solid #92a7a2; margin: 0;"/>
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        @if($notif->type == 'friend_request')
                            <h5 class="card-title">@lang('connectfriend.notif_req2') {{ $notif->sender->name }}</h5>
                        @elseif($notif->type == 'friend_accept')
                            <h5 class="card-title">@lang('connectfriend.notif_acc2') {{ $notif->sender->name }}</h5>
                        @endif
                    </div>              
                </div>
            </div>
            </a>
        @endif
        </div>
        <div class="col-1">

        </div>
    </div>
    @endforeach
    
</div>

<style>
    .bg-custom{
        background-color: #92a7a2;
        color: white;
    }
</style>
@endsection