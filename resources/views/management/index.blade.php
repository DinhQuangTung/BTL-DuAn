@extends('layouts.admin')
@section('content')
    <div class="account-management">
        <div class="container-fluid admin-navbar d-flex w-100">
            <div class="row">
                <ul class="nav nav-pills tab-bar" id="pillsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#pillsUser">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#pillsCourse">Courses</a>
                    </li>
                </ul>
                <form class="managementSearch" action="{{ route('management.index') }}" method="GET">
                    <div class="d-flex justify-content-center h-100">
                        <div class="search-bar">
                            <input class="search-input" type="text" name="keyword" placeholder="Search...">
                            <button type="submit" class="search-icon"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <ul class="nav nav-pills tab-bar" id="pillsTab" role="tablist">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle notification-bell" href="{{ route('users.show', [Auth::id()]) }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-center w-100" aria-labelledby="navbarDropdown" id="dropdownMenuUser">
                            <form id="logoutForm" action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" id="logoutButton" class="dropdown-item m-0 text-center">Logout</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle notification-bell" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="far fa-bell active">
                                <span class="notification-number">1<span>
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown" id="dropdownMenuUser">
                        
                        </div>
                    </li>
                </ul> 
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane container active" id="pillsUser">
                @include('management.users')
            </div>
            <div class="tab-pane container fade" id="pillsCourse">
                @include('management.courses')
            </div>
        </div>
    </div>
@endsection
