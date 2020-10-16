@extends('layouts.manage')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                  Student Dashboard

              </div>
              <h5>
                  You admitted {{str_replace('_', ' ', $admission_documents[1])}} ,
              </h5>
              <p>
                  <h5> 
                      <em>
                          You can now download the admission , course requirements  and fees structure 
                      </em>
                  </h5>
                  <h5>
              <a href="/storage/admitted_students/{{$admission_documents[0]}}{{$admission_documents[1]}}.pdf" target="_blank"><i class="fa fa-download">Download Admission letter</i></a>
                  </h5>
          <h5><a href="/storage/uploads/admissions/{{$admission_documents[3]}}" target="_blank"><i class="fa fa-download" aria-hidden="true">Download Course Requirements</i> </a> </h5>
          @if(!empty($admission_documents[2]))
          <h5>
              <a href="/storage/uploads/{{$admission_documents[2]}}" target="_blank">
                   <i class="fa fa-download" aria-hidden="true">
                  Download Fees Structure
                   </i>
             </a>
           </h5> <br>
          @else
          <p>No fees structure added yet, Contact the office please.</p> <br>
            @endif 
            <hr>
          </div>
      </div>
  </div>
</div>
@endsection