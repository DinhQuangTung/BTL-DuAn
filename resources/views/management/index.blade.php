@extends('layouts.admin')
@section('content')
    <div class="account-management">
        <div class="container-xl d-flex">
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
