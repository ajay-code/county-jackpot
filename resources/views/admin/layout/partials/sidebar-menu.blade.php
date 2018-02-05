<li class="header">Menu</li>
<li class="{!! classActivePath('admin/home') !!}">
    <a href="#">
        <i class="fa fa-fw fa-dashboard"></i>
        <span>DashBoard</span>
    </a>
</li>
<li class="{!! classActivePath('admin/counties') !!}">
    <a href="{{route('admin.counties.index')}}">
        <i class="fa fa-fw fa-flag"></i>
        <span>Counties</span>
    </a>
</li>
<li class="{!! classActivePath('admin/county-draw-info') !!}">
    <a href="{{route('admin.county-draw-info.index')}}">
        <i class="fa fa-fw fa-trophy"></i>
        <span>Counties Draws Info</span>
    </a>
</li>
<li class="{!! classActivePath('admin/county-draws') !!}">
    <a href="{{route('admin.county-draws.draws')}}">
        <i class="fa fa-fw fa-trophy"></i>
        <span>On Going / Expired Draws</span>
    </a>
</li>
<li class="{!! classActivePath('admin/users') !!}">
    <a href="{{route('admin.users.show')}}">
        <i class="fa fa-fw fa-user"></i>
        <span>Users</span>
    </a>
</li>
<li class="{!! classActivePath('admin/payment-requests') !!}">
    <a href="{{route('admin.payment-requests')}}">
        <i class="fa fa-fw fa-list-ul"></i>
        <span>Payment Requests</span>
    </a>
</li>
<li class="{!! classActivePath('admin/featured') !!}">
    <a href="{{route('admin.featured')}}">
        <i class="fa fa-fw fa-star"></i>
        <span>Featured Draw</span>
    </a>
</li>
<li class="header">ACCOUNT SSETTINGS</li>
<li class="{!! classActivePath('admin/password/change') !!}">
    <a href="{{route('admin.password.change')}}">
        <i class="fa fa-fw fa-lock"></i>
        <span>Change Password</span>
    </a>
</li>