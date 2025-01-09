@extends('layout.master')

@section('content')
<br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">
            <h2>@lang('connectfriend.chat')</h2>
            <div class="list-group">
                @if($chatHistories->isEmpty())
                    <h5>@lang('connectfriend.no_chatlist')</h5> 
                @endif
                @foreach($chatHistories as $chat)
                    <a href="{{ route('chat.page', ['id' => $chat['chatPartner']->id]) }}" class="list-group-item list-group-item-action d-flex align-items-center my-2">
                        <img src="{{ $chat['chatPartner']->image ? asset('uploads/' . $chat['chatPartner']->image) : asset('img/profile.jpg') }}" 
                             class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                        <div>
                            <h6 class="my-1">{{ $chat['chatPartner']->name }}</h6>
                            <h6 class="my-2">{{$chat['message']}}</h6>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-1">

        </div>
    </div>
</div>
@endsection