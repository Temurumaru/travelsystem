@extends('layouts.main')

@section('header_nav')

  <li class="nav-item dropdown pe-3">
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
      <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
      <span class="d-none d-md-block dropdown-toggle ps-2">T.Teshavoyev</span>
    </a><!-- End Profile Iamge Icon -->
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
      <li class="dropdown-header">
        <h6>Teshavoy Teshavoyev</h6>
        <span>Yetti Travel</span>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="{{route('profile')}}">
          <i class="bi bi-person"></i>
          <span>Мой профиль</span>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li>
        <a class="dropdown-item d-flex align-items-center" href="/exit">
          <i class="bi bi-box-arrow-right"></i>
          <span>Выйти</span>
        </a>
      </li>
    </ul><!-- End Profile Dropdown Items -->
  </li><!-- End Profile Nav -->

@endsection

@section('sidebar')

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#active-tour" data-bs-toggle="collapse" href="#">
      <i class="bi bi-airplane"></i><span>Активные Туры</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <div style="overflow-y:scroll; max-height:400px;">
      <ul id="active-tour" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/tour/[tour_id]">
          <i class="bi bi-circle"></i><span>Пекин <span class="badge rounded-pill bg-secondary">InTour</span></span>
        </a>
      </li>

      <li>
        <a href="/tour/[tour_id]">
          <i class="bi bi-circle"></i><span>Гонконг <span class="badge rounded-pill bg-primary">Yetti Travel</span></span>
        </a>
      </li>

      <li>
        <a href="/tour/[tour_id]">
          <i class="bi bi-circle"></i><span>Гуанджоу <span class="badge rounded-pill bg-secondary">Osmon Travel</span></span>
        </a>
      </li>
    </ul>
    </div>
    
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#ended-tour" data-bs-toggle="collapse" href="#">
      <i class="bi bi-slash-circle"></i><span>Завершённые Туры</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="ended-tour" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="/tour/[tour_id]">
          <i class="bi bi-circle"></i><span>Шанхай <span class="badge rounded-pill bg-secondary">Osmon Travel</span></span>
        </a>
      </li>
      <li>
        <a href="/tour/[tour_id]">
          <i class="bi bi-circle"></i><span>Токио <span class="badge rounded-pill bg-secondary">InTour</span></span>
        </a>
      </li>
    </ul>
  </li>

@endsection