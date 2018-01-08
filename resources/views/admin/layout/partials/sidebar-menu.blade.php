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
<li class="{!! classActivePath('admin/lotteries') !!}">
    <a href="{{route('admin.lotteries.index')}}">
        <i class="fa fa-fw fa-trophy"></i>
        <span>Lotteries</span>
    </a>
</li>
<li class="{!! classActivePath('admin/users') !!}">
    <a href="{{route('admin.users.show')}}">
        <i class="fa fa-fw fa-user"></i>
        <span>Users</span>
    </a>
</li>
<li class="header">ACCOUNT SSETTINGS</li>
<li class="{!! classActivePath('admin/password/change') !!}">
    <a href="{{route('admin.password.change')}}">
        <i class="fa fa-fw fa-lock"></i>
        <span>Change Password</span>
    </a>
</li>