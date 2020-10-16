@extends('layouts.frontend')
@section('content')
{{-- Slider section --}}
<section id="slider">
<div class="container-fluid">
 <div class="row d-flex justify-content-center 70vh">
     <div class="col-md-10 hero_image_cover">
     {{-- Carousel to show the fading images --}}
     <div class="carousel slide carousel-fade" id="school-images" data-ride="carousel">
            <ol class="carousel-indicators">
                    <li data-target="school-images" class="active" data-slide-to="0"></li>
                    <li data-target="school-images"  data-slide-to="1"></li>
                    <li data-target="school-images"  data-slide-to="2"></li>
                    <li data-target="school-images"  data-slide-to="3"></li>
                    <li data-target="school-images"  data-slide-to="4"></li>
                </ol>
         <div class="carousel-inner">
             <div class="carousel-item active">
                 <img src="/storage/frontend/default-img.jpg"  class="d-block w-100 slider-image"  alt="Kaelo Technical and Vocational College">
                 <div class="carousel-caption">
                     <h3>Kaelo Technical and Vocational College </h3>
                     <p>Innovation for a better future </p>
                 </div>
             </div>
             @foreach ($collect[0] as $post)
             <div class="carousel-item">   
             <img src="/storage/uploads/{{$post->image_uploaded}}"  class="d-block w-100 slider-image" alt="Kaelo Technical and Vocational College">
                    <div class="carousel-caption">    
                    <h3>{!!$post->title!!}</h3>
                            <p>{!!$post->description!!}</p>
                    </div>
                </div>
                @endforeach
         </div>
         <a href="#school-images" role="button" data-slide="prev" class="carousel-control-prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>  
             </a>
         <a href="#school-images" role="button" data-slide="next" class="carousel-control-next">
             <span class="carousel-control-next-icon" aria-hidden="true"> </span>
                  <span class="sr-only">Next</span>
               
         </a>
        
     </div>
    </div>
  </div>  
  </div> 
  </section>

{{-- section for landing page message --}}
<div class="row justify-content-center">
    <div class="col-md-10 offset-md-1 hero_padding">
        <p class="hero_heading">KAELO TECHNICAL AND VOCATIONAL COLLEGE</p>
        <p class="hero_subheading">A home for pursuing your Diploma, Certificate and Artisan Course.
            Its our joy to train you and help you move to the horizon of your career by ensuring you are 
            industry-ready by the time you are graduating.
        </p>
       </div>
</div>
{{-- Section with the news --}}
<div class="container-fluid middle_section">
    <div class="row mt-2">
        <div class="col-md-4 offset-md-1 d-flex justify-content-center align-items-center">
            <i class="fa fa-envelope-open fa-2x circle"></i> 
            <div class="circle-comment">
                Check out our News
            </div>
        </div>
        <div class="col-md-6 mt_negative1">
            <div class="card shadow">
                <h2 class="card-title text-center text-dark p-2 georgia">
                     <div class="card-body">
                     <ul class="list-group list-group-flush">
                         <p hidden>{{$i=0}}</p>  
                           @foreach($collect[1] as $announcement)
                       <li class="list-group-item">
                           @if($i==0)
                           <h4>
                               <em>
                                    <a href="#" class="text-dark text-bold"> <i class="fa fa-spinner fa-spin text-danger"></i> <span class="text-danger">New !!</span>
                                  {{$i+=1}}. {{$announcement->title}}</a>
                             </em><br>
                         </h4>
                         @else
                         <h4>
                             <em>
                                  <a href="#" class="text-dark text-bold">
                                {{$i+=1}}. {{$announcement->title}}</a>
                             </em><br>
                       </h4>
                         @endif
                         <h4>
                             <small class="text-dark text-bold">
                                 {{$announcement->description}}
                             </small>
                         </h4>
                         @if($announcement->image_uploaded !=='noimage.jpg')
                         <h4 class="text-center">
                             <small>   
                             <a href="/storage/uploads/{{$announcement->image_uploaded}}"> <i class="fa fa-download"></i>Download</a>    
                             </small>
                         </h4>
                         @endif
                     </li>   
                   @endforeach
                       </ul>
                     </div>    
            </div>
        </div>
    </div>
  {{-- section for apply for courses --}}   
      <div class="row mt-5 pb_100">
          <div class="col-md-6 offset-md-1">
            <div class="card shadow">
                <h2 class="card-title text-center text-dark p-2 georgia"> <br> 
                
                </h2>
                <div class="card-body">
                    <h5 class="text-center">Click the button below and begin the process of applying for a course</h5>
                    <ol type="a" class="list-group list-group-flush text-dark font-weight-bold">
                        <li  class="list-group-item">
                        Search for a course
                        </li>
                        <li class="list-group-item">
                        Click on the apply part for the course you have choosen then Provide all the details as required 
                        </li>
                        <li class="list-group-item">
                        You will get an admission letter which you will come with during reporting day
                        </li>
                    </ol>
                </div>
                <div class="card-footer">
                    <a href="{{route('frontend.applications')}}" class="btn btn-block light-blue"><i class="fa fa-pencil">  Apply</i></a>
                    </div>
            </div>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa fa-edit fa-2x  circle"></i> 
            <div class="circle-comment">
                Apply for a Course
            </div>

          </div>
      </div>
  </div>
<div class="container-fluid">
<div class="row mt-2 pb_100">
    <div class="col-md-8 offset-md-2">
        <img src="/storage/frontend/principalkaelo.jpeg" class="frontend_profile_pic" alt="Kaelo Technical and Vocational College">
        <h3 class="frontend_profile_message">
            "Welcome to Kaelo Technical and Vocational College,
            Your stay with us will be enjoyable and worth while as you 
            will get the best learning experience which will pay back a ton once you are out there
            working for the industry or in self-employment"

        </h3>
        <p><span class="hero_subheading_profile">BENJAMEN NCEBERE | Principal - Kaelo TVC</span></p>
    </div>
    {{-- contact section --}}
    <div class="container-fluid">
        <div class="row card_deck">
            <div class="col-md-3 offset-md-2">
                <div class="card shadow">
                    <p class="card_title">
                        <i class="fa fa-envelope-open"></i>   Email us on
                    </p>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                info@kaelotvc.ac.ke
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <p class="card_title">
                        <i class="fa fa-phone"></i>   Call us on
                    </p>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                              0759417000
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <p class="card_title">
                        <i class="fa fa-inbox"></i>   Our Address
                    </p>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                              P.O. Box 262 - 60601, Laare - Meru
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
{{-- <div class="card-deck">
  
<div class="card shadow">
    <h2 class="card-title text-center p-2 georgia"><br>
        <img src="/storage/frontend/kaelotvclogo.png" alt="Laisamis Technical" class="circle-image">
    </h2>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"> <a href="{{route('frontend.contact')}}" class="text-dark font-weight-bold"><i class="fa fa-envelope p-2"></i>Email: kaelotechnical@gmail.com </a></li>
            <li class="list-group-item"><a href="{{route('frontend.contact')}}" class="text-dark font-weight-bold"><i class="fa fa-phone p-2"></i> Phone Number: 0759417000</a></li>
            <li class="list-group-item"><a href="{{route('frontend.contact')}}" class="text-dark font-weight-bold"><i class="fa fa-envelope p-2"></i> P.O. Box 262 - 60601, Laare -Meru</a></li>
            <li class="list-group-item"><a href="{{route('frontend.contact')}}" class="text-dark font-weight-bold"><i class="fa fa-globe p-2"></i> www.kaelotvc.ac.ke</a></li>
        </ul>
    </div>
                <div class="card-footer">
                <a href="{{route('frontend.contact')}}" class="btn btn-block light-blue "><i class="fa fa-address-book">  Contact us</i></a>
                </div>
                </div>
            </div> --}}
        </div>
    </div>
        
@endsection