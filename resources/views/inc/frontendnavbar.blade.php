<nav class="navbar navbar-expand-md navbar-dark navbar_color  shadow-sm" style="margin-top:40px;">
    <div class="container-fluid">
        <a href="/" class="navbar-brand ">
            <img src="/storage/frontend/kaelotvclogo.png" alt="Kaelo Technical and Vocational College" class="navbar-brandimage">  
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  font-weight-bold mx-auto">
                <li class="nav-item  {{(Request::is('/') ? 'active': '')}}">
                    <a class="nav-link" href="/">
                        Home
                    </a> 
                </li>
                 {{-- About us Tab --}}
                 <li class="nav-item dropdown {{(Request::is('vision') || Request::is('contact_us')  ? 'active': '')}}">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        About Us
                        <span class="caret">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a href="/vision" class="dropdown-item">Mission, Vision & Core Values</a>
                    <a href="#" class="dropdown-item">Administration</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/contact_us">
                                  Contact Us
                        </a>
                    </div>
                </li>
                        {{-- Academics Tab --}}
                        <li class="nav-item dropdown {{(Request::is('department.business')  ? 'active': '')}}">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Academics <span class="caret"></span>
                            </a>
    
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="dropdown-submenu">
                            <a href="#" class="dropdown-item font-weight-bold dropdown-toggle">DEPARTMENTS</a>
                         <ul class="dropdown-menu">
                         <li><a href="{{route("department.business")}}" class="dropdown-item"><i class="fa fa-address-book"></i>  BUSINESS AND LIBERAL STUDIES</a>
                        </li>
                        <li><a href="{{route("department.automotive")}}" class="dropdown-item"> <i class="fa fa-car"></i> AUTOMOTIVE ENGINEERING</a></li>
                        <li>
                            <a href="{{route("department.electrical")}}" class="dropdown-item"> <i class="fa fa-microchip"></i> ELECTRICAL ENGINEERING</a>
                        </li>
                        <li>
                            <a href="{{route("department.ict")}}" class="dropdown-item"> <i class="fa fa-desktop"></i> I.C.T </a>
                        </li>
                        <li>
                            <a href="{{route("department.building")}}" class="dropdown-item"> <i class="fa fa-home"></i> BUILDING & CIVIL ENG. </a>
                        </li>
                        </ul>
                        </li>
                        
                         </ul>
                        </li>
                        {{-- Join Us Tab --}}
                    <li class="nav-item dropdown {{(Request::is('application') || Request::is('student/login') || Request::is('/login')  ? 'active': '')}}">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Apply<span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                        <a href="{{route('frontend.applications')}}" class="dropdown-item">Online Course Application
                        </a></li>
                        </ul>
                    </li>
            </ul>
        </div>
    </div>
</nav>