@can('manage users')
    <li class="{{ Request::is('groups*') ? 'active' : '' }}">
        <a href="{!! route('groups.index') !!}"><i class="fa fa-edit"></i><span>Groups</span></a>
    </li>
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
    </li>
@endcan

