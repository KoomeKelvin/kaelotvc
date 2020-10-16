<nav class="navbar navbar-expand-md navbar-dark navbar_color shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
           <img class="dashboard_logo" src="/storage/frontend/kaelotvclogo.png" alt="Kaelo TVC"> Kaelo TVC
        </a>
        @if(request()->segment(1)=='manage' || request()->segment(1)=='registered_students')
        <a class="nav-item  d-block d-md-none" style="border:none;" id="show-hide-menu"><i class="fa fa-arrow-circle-right fa-2x" style="color: #F67F08;"></i></a>
        @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{__('login')}}</a>

                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item"> <img  class="profile-pic" src="/storage/AandStaff/{{(Auth::user()->file!== null ? Auth::user()->file->file_path : 'avatar.png')}}" alt=""></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                            <a href="#" class="dropdown-item"> <i class="fa fa-user-circle-o px-2"></i> Profile</a>
                            <a href="#" class="dropdown-item"><i class="fa fa-bell px-2"></i>Notifications</a>
                        <a href="{{route('manage.dashboard')}}" class="dropdown-item"> <i class="fa fa-cog px-2"></i>Institution</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('trainer.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             <i class="fa fa-sign-out px-2"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('trainer.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
</div>
</nav>