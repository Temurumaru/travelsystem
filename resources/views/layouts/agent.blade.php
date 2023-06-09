@extends('layouts.main')

@section('header_nav')

  <li class="nav-item dropdown pe-3">
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
      <img src="{{(@$_SESSION['user'] -> avatar) ? "/uploads/avatar/".$_SESSION['user'] -> avatar : "/assets/img/profile-img.jpg"}}" alt="Profile" class="rounded-circle">
      <span class="d-none d-md-block dropdown-toggle ps-2">@yield('username')</span>
    </a><!-- End Profile Iamge Icon -->
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li class="dropdown-header">
        <h6>@yield('username') ({{$_SESSION['user'] -> login}})</h6>
        <span>@yield('usersubname')</span>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="{{route('SignOut')}}">
          <i class="bi bi-box-arrow-right"></i>
          <span>Выйти</span>
        </a>
      </li>
    </ul><!-- End Profile Dropdown Items -->
  </li><!-- End Profile Nav -->

@endsection

@section('sidebar')

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('tour_booked')}}">
      <i class="bi bi-shield"></i>
      <span>Забронированные туры</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('tour_actives')}}">
      <i class="bi bi-airplane"></i>
      <span>Активные туры</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{route('tour_old')}}">
      <i class="bi bi-slash-circle"></i>
      <span>Завершённые Туры</span>
    </a>
  </li>

@endsection