@extends('layout.master')

@section('content')
<br><br><br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-1">
        </div>
        <div class="col-10">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/banner.png')}}" class="d-block w-100" >
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                </div>
            </div>
        <div class="col-1">
        </div>
        </div>
        <div class="container-fluid" >
            <div class="row d-flex my-2" >
                <div class="col-1" >
                    
                </div>
                <div class="col-10 d-flex justify-content-between align-items-center" >
                    <div style="margin-left:77px ;">
                        <form class="d-flex align-items-center" action="{{route('search.page')}}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="@lang('connectfriend.search2')" aria-label="Search" name="query" style="width:220px ;">
                            <button class="btn btn-outline-success"  type="submit">@lang('connectfriend.search')</button>
                        </form>
                    </div>
                    <div class="d-flex align-items-center" style="margin-right:80px ;">
                    <img src="{{ asset('img/filter.png')}}" width="28" height="auto" class="rounded-circle ">
                    <li class="nav-item dropdown" style="list-style-type: none;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            @if(request()->get('filter') == 'male')
                                @lang('connectfriend.male')
                            @elseif(request()->get('filter') == 'female')
                                @lang('connectfriend.female')
                            @else
                                @lang('connectfriend.all')
                            @endif
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('home_filter.page', ['filter' => 'all'])}}">@lang('connectfriend.all')</a></li>
                            <li><a class="dropdown-item" href="{{route('home_filter.page', ['filter' => 'male'])}}">@lang('connectfriend.male')</a></li>
                            <li><a class="dropdown-item" href="{{route('home_filter.page', ['filter' => 'female'])}}">@lang('connectfriend.female')</a></li>
                        </ul>
                    </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-5 my-2">
    <div class="px-5">
        <div class="row px-5">
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
        </div>
    </div>
</div>      
</div>
<br>
<div class="d-flex justify-content-center">
        {{ $users->links() }}
</div>

<style>
    .nav-link:hover {
        color: #b27b62;
    }
    .btn-outline-success {
        background-color: #b27b62; 
        color: black; 
        border-color: black; 
        }
        .btn-outline-success:hover {
        background-color: #f5ebeb; 
        color: black; 
        border-color: black; 
        }
</style>
@endsection