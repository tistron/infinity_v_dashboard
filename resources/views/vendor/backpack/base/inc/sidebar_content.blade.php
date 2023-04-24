{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('users') }}"><i class="nav-icon la la-th-list"></i> User</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('owned-vehicles') }}"><i class="nav-icon la la-th-list"></i> Fahrzeuge</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('vehicles-parking') }}"><i class="nav-icon la la-th-list"></i> Fahrzeug Parking</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('hash_to_model_adapter') }}"><i class="nav-icon la la-th-list"></i> Hash Converter</a></li>

<!-- Users, Roles, Permissions -->
@php
   $has_user_role = backpack_user()->hasRole('Admin');
@endphp

@if($has_user_role)
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
        </ul>
    </li>
@endif
