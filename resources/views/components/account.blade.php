@if(Auth::guard('web')->check())
    <h2 class="text-info">
        Trainer Account 
    </h2>
@endif
@if(Auth::guard('student')->check())
    <h2 class="text-info">
        Student Account 
    </h2>
@endif