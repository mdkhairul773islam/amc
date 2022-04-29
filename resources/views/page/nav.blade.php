<!-- body nav start -->
<div class="body_nav">
    <ul>
        @if(Auth::user()->privilege == 'super')
        <li><a class="addPage" href="{{route('admin.page.create')}}">Add Page</a></li>
        @endif
        <li><a class="allPage" href="{{route('admin.page')}}" >All Page</a></li>
    </ul>
</div>
<!-- body nav start -->
