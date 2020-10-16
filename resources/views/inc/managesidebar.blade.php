<!-- This is a custom side bar -->
<div class="sidebar-wrapper" id="admin-side-bar">
<ul class="sidebar-nav">
<li>
<p>GENERAL</p>
</li>
<li><a href="#">Dashboard</a></li>
<li>
        <p>MANAGE</p>
        </li>
@role('su|principal')  
<li class="{{(request()->is('manage/users*')) ? 'active-links' : ''}}"><a href="{{route('users.index')}}">Users</a></li>
<li><a class="the_parent {{(request()->is('manage/roles*') || request()->is('manage/permissions*') )  ? 'active-links' : ''}}">Roles and Permissions</a>
        <ul class="the_child">
        <li><a href="{{route('permissions.index')}}" class="{{(request()->is('manage/permissions*')) ? 'active-links' : ''}}">Permissions</a></li>
        <li><a href="{{route('roles.index')}}" class="{{(request()->is('manage/roles*')) ? 'active-links' : ''}}">Roles</a></li>
        </ul>
</li>
<li class="{{(request()->is('manage/posts*')) ? 'active-links' : ''}}"><a href="{{route('posts.index')}}">Posts </a></li>
<li class="{{(request()->is('registered_students/students*') || request()->is('registered_students')) ? 'active-links' : ''}}"><a href="{{route('registered.index')}}">Registered Students </a></li>
@endrole
@role('su|principal|registrar')
<li class="{{(request()->is('manage/courses*')) ? 'active-links' : ''}}"><a href="{{route('courses.index')}}">Courses </a></li>
<li class="{{(request()->is('manage/theclasses*')) ? 'active-links' : ''}}"><a href="{{route('theclasses.index')}}">Classes</a></li>
@endrole
@role('su|principal|registrar|hod|classteacher')
<li class="{{(request()->is('manage/units*')) ? 'active-links' : ''}}"><a href="{{route('units.index')}}">Units</a></li>
@endrole
@role('su|principal|registrar|hod|classteacher|trainer')
<li class="{{(request()->is('manage/files*')) ? 'active-links' : ''}}"><a href="{{route('files.index')}}">Files </a></li>
@endrole
@role('su|principal|registrar|hod|classteacher|trainer')
<li class="{{(request()->is('manage/marks*')) || (request()->is('manage/discussion*')) || (request()->is('manage/elimishafeedback/*')) || (request()->is('manage/elimishacomments/*')) || (request()->is('manage/search_marks')) ? 'active-links' : ''}}"><a href="{{route('marks.index')}}">Techjibu Elearning </a></li>
@endrole
<li><p>UPDATE PROFILE</p></li>
@role('su|principal|registrar|hod|classteacher|trainer')
<li class="{{(request()->is('manage/profile*')) ? 'active-links' : '' }}"><a href="{{route('user.profile')}}">Profile</a></li>
@endrole
</ul>

</div>
