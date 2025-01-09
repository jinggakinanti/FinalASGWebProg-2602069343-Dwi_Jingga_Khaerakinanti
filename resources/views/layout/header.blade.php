<nav class="navbar navbar-expand-lg navbar-light shadow fixed-top" style="background-color:#eea885">
    <div class="container-fluid">
        <!-- Logo Section -->

        <!-- Navigation Section -->
        <div class="col-6 justify-content-center align-items-center">
                <ul class="navbar-nav gap-4 align-items-center">
                    
                    <a class="navbar-brand" href="{{route(name: 'home.page')}}" style="color:#584344 ;">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" width="60" height="54" class="rounded-circle">
                        ConnectFriend
                    </a>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home.page') ? 'active' : '' }}" aria-current="active" href="{{route('home.page')}}">@lang('connectfriend.home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('avatar.page') ? 'active' : '' }}" aria-current="active" href="{{route('avatar.page')}}">Avatar</a>
                    </li>
                </ul>
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center">
                <ul class="navbar-nav ms-auto gap-4 align-items-center">
                    @auth
                    <a href="{{route(name: 'notification.page')}}">
                        <img src="{{ asset('img/notif.png') }}" alt="Logo" width="60" height="54" class="rounded-circle">
                    </a>
                    <a href="{{route('chat_list.page')}}">
                        <img src="{{ asset('img/chat.png') }}" alt="Logo" width="60" height="54" class="rounded-circle">
                    </a>
                    <div class="dropdown">
                    <button class="btn btn-language dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('connectfriend.profile')
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{route('profile.page')}}" id="viewProfile">@lang('connectfriend.profile2')</a></li>
                        <li><a class="dropdown-item" href="{{route('settings.page')}}" id="settings">@lang('connectfriend.settings')</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                @lang('connectfriend.logout')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            </form>
                        </li>
                    </ul>
                    </div>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang('connectfriend.login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('connectfriend.register')</a>
                    </li>
                    @endguest
                    <div class="dropdown">
                    <button class="btn btn-language dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (app()->getLocale() === 'en')
                            en
                        @elseif(app()->getLocale() === 'id')
                            id
                        @endif
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('set-locale', 'en') }}" data-value="en">en</a></li>
                        <li><a class="dropdown-item" href="{{ route('set-locale', 'id') }}" data-value="id">id</a></li>
                    </ul>
                    </div>
                </ul>
        </div>
    </div>
</nav>

<style>
        .navbar-nav .nav-link {
            color: #000; 
        }
        .navbar-nav .nav-link:hover {
            color: #b27b62; 
        }
        .navbar-nav .nav-link.active {
            color: #b27b62; 
        }
        .navbar-nav .nav-link {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-language {
        background-color: #eea885; 
        color: black; 
        border:none ;
        }
        .btn-language:hover {
        background-color: #f5ebeb; 
        color: black; 
        border-color: #f5ebeb; 
        }
        .btn-active{
            color: #b27b62 !important; 
        }
</style>

<script>
    if (window.location.pathname === "{{ route('profile.page', [], false) }}") {
        const dropdownButton = document.getElementById('dropdownMenuButton');
        dropdownButton.classList.add('btn-active'); // Add the active class
    }
</script>
