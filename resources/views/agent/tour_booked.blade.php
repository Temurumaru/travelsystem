@extends('layouts.agent')


@section('title', 'Забронированные туры')
@section('header_title', APP_NAME)
@section('sub_title', 'Забронированные туры')

@section('username', 'Teshavoy Teshavoyev')
@section('usersubname', 'Yetti Travel')


@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-title">Ваши забронированные туры</div>
      
      <div class="col card-2 mb-4">
        <a href="/tour/" class="un-style">
          <div class="row-lg-12 cnt">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="50rem">
            <span class="mx-3 lead"><b>Yetti travel</b></span>
            |
            <span class="mx-3 lead">Забронировали <b>35 мест</b></span>
            |
            <span class="mx-3 lead">Цена <q><b>1500$</b></q></span>
            |
            <span class="mx-3 lead">Всего мест <b>50</b></span>
            |
            <span class="mx-3 lead">Свободно мест <b>45</b></span>
          </div>
        </a>
        <div class="row-lg-12 mt-3">
          <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
              <span class="lead" style="margin-right:0.5rem;margin-top:-1px;"><b>Отправление |</b> </span>
              <li class="breadcrumb-item lead active"> Berlin</li>
              <li class="breadcrumb-item lead">London</li>
              <li class="breadcrumb-item lead">Istanbul</li>
              <li class="breadcrumb-item lead active">Buenos Aires</li>
              <span class="lead-p" style="margin-left:0.5rem;margin-top:-2px;"><b><i>13.05.2023</i></b>
                <button class="btn btn-warning mx-2"><i class="bi bi-pencil-fill"></i></button>
              </span>
            </ol>
          </nav>
          <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
              <span class="lead" style="margin-right:0.5rem;margin-top:-1px;"><b>Возвращение |</b> </span>
              <li class="breadcrumb-item lead active">Buenos Aires</li>
              <li class="breadcrumb-item lead">Istanbul</li>
              <li class="breadcrumb-item lead">London</li>
              <li class="breadcrumb-item lead active"> Berlin</li>
              <span class="lead-p" style="margin-left:0.5rem;margin-top:-2px;"><b><i>13.05.2023</i></b>
                <button class="btn btn-danger mx-2"><i class="bi bi-trash-fill"></i></button>
              </span>
            </ol>
          </nav>
        </div>
      </div>

      
      <div class="col card-2 mb-4">
        <a href="/tour/" class="un-style">
          <div class="row-lg-12 cnt">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="50rem">
            <span class="mx-3 lead"><b>Lufthansa</b></span>
            |
            <span class="mx-3 lead">Забронировали <b>4 мест</b></span>
            |
            <span class="mx-3 lead">Цена <q><b>1500$</b></q></span>
            |
            <span class="mx-3 lead">Всего мест <b>50</b></span>
            |
            <span class="mx-3 lead">Свободно мест <b>45</b></span>
          </div>
        </a>
        <div class="row-lg-12 mt-3">
          <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
              <span class="lead" style="margin-right:0.5rem;margin-top:-1px;"><b>Отправление |</b> </span>
              <li class="breadcrumb-item lead active"> Berlin</li>
              <li class="breadcrumb-item lead">London</li>
              <li class="breadcrumb-item lead">Istanbul</li>
              <li class="breadcrumb-item lead active">Buenos Aires</li>
              <span class="lead-p" style="margin-left:0.5rem;margin-top:-2px;"><b><i>13.05.2023</i></b>
                <button class="btn btn-warning mx-2"><i class="bi bi-pencil-fill"></i></button>
              </span>
            </ol>
          </nav>
          <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
              <span class="lead" style="margin-right:0.5rem;margin-top:-1px;"><b>Возвращение |</b> </span>
              <li class="breadcrumb-item lead active">Buenos Aires</li>
              <li class="breadcrumb-item lead">Istanbul</li>
              <li class="breadcrumb-item lead">London</li>
              <li class="breadcrumb-item lead active"> Berlin</li>
              <span class="lead-p" style="margin-left:0.5rem;margin-top:-2px;"><b><i>13.05.2023</i></b>
                <button class="btn btn-danger mx-2"><i class="bi bi-trash-fill"></i></button>
              </span>
            </ol>
          </nav>
        </div>
      </div>
      
    </div>
  </div>

@endsection
