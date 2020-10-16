<nav class="navbar navbar-expand-md navbar-dark navbar_color shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
           <img src="/storage/frontend/kaelotvclogo.png" class="dashboard_logo" alt="Kaelo T.V.C"> Kaelo T.V.C
        </a>
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
                @else
                <li class="nav-item"> <img  class="profile-pic" src="/storage/student/passport/{{(Auth::guard('student')->user()->passport!== null ? Auth::guard('student')->user()->passport : 'avatar.png')}}" alt=""></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('student')->user()->full_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                        <a href="{{route('student.profile')}}" class="dropdown-item"> <i class="fa fa-user-circle-o px-2"></i> Profile</a>
                        <a href="{{route('admissions.index')}}" class="dropdown-item"><i class="fa fa-edit px-2"></i>Admissions</a>
                        <a href="{{route('student.results')}}" class="dropdown-item"> <i class="fa fa-binoculars px-2"></i>Check Results</a>
                        <a href="{{route('units.get')}}" class="dropdown-item"> <i class="fa fa-graduation-cap px-2"></i>Techjibu Class</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('student.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                             <i class="fa fa-sign-out px-2"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>



                    
                @endguest
            </ul>
        </div>
    </div>
</nav>