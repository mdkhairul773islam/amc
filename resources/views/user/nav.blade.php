
<!-- body nav start -->
@if(Auth::user()->privilege != 'user')
<div class="body_nav">
    <ul>
        <li><a class="add_user" href="{{route('admin.user.create')}}" class="active">Add User</a></li>
        <li><a class="all_user" href="{{route('admin.user')}}" >All User</a></li>
    </ul>
</div>
@endif
<!-- body nav start -->
