@extends('layouts.agent')


@section('title', 'Тур [Название]')
@section('header_title', APP_NAME)
@section('sub_title', 'Тур [Название]')


@section('content')
  
  <div class="col-lg-8">

    <div class="card">
      <div class="card-body profile-overview">
        <h5 class="card-title">Путь туда. Berlin <i class="bi bi-chevron-double-right"></i> Buenos Aires</h5>

        <!-- Bordered Tabs Justified -->
        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#right-way1" type="button" role="tab" aria-controls="home" aria-selected="true">Berlin <i class="bi bi-arrow-right"></i> London</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#right-way12" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">London <i class="bi bi-arrow-right"></i> Istanbul</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#right-way3" type="button" role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">Istanbul <i class="bi bi-arrow-right"></i> Brazila</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#right-way4" type="button" role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">Brazila <i class="bi bi-arrow-right"></i> Buenos Aires</button>
          </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
          <div class="tab-pane fade show active" id="right-way1" role="tabpanel" aria-labelledby="home-tab">
            <h5 class="card-title">Детали</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время вылета (Berlin)</div>
              <div class="col-lg-9 col-md-8">2023.04.02 21:30</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время прилёта в (London)</div>
              <div class="col-lg-9 col-md-8">2023.04.03 03:00</div>
            </div>
          </div>
          <div class="tab-pane fade" id="right-way12" role="tabpanel" aria-labelledby="profile-tab">
            <h5 class="card-title">Детали</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время вылета (Berlin)</div>
              <div class="col-lg-9 col-md-8">2023.04.02 21:30</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время прилёта в (London)</div>
              <div class="col-lg-9 col-md-8">2023.04.03 03:00</div>
            </div>
          </div>
          <div class="tab-pane fade" id="right-way3" role="tabpanel" aria-labelledby="contact-tab">
            <h5 class="card-title">Детали</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время вылета (Berlin)</div>
              <div class="col-lg-9 col-md-8">2023.04.02 21:30</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время прилёта в (London)</div>
              <div class="col-lg-9 col-md-8">2023.04.03 03:00</div>
            </div>
          </div>
          <div class="tab-pane fade" id="right-way4" role="tabpanel" aria-labelledby="contact-tab">
            <h5 class="card-title">Детали</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время вылета (Berlin)</div>
              <div class="col-lg-9 col-md-8">2023.04.02 21:30</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время прилёта в (London)</div>
              <div class="col-lg-9 col-md-8">2023.04.03 03:00</div>
            </div>
          </div>
        </div><!-- End Bordered Tabs Justified -->

      </div>
    </div>

    <div class="card">
      <div class="card-body profile-overview">
        <h5 class="card-title">Путь Обратно. Buenos Aires <i class="bi bi-chevron-double-right"></i> Berlin</h5>

        <!-- Bordered Tabs Justified -->
        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#left-way1" type="button" role="tab" aria-controls="home" aria-selected="true">Berlin <i class="bi bi-arrow-right"></i> London</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#left-way12" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">London <i class="bi bi-arrow-right"></i> Istanbul</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#left-way3" type="button" role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">Istanbul <i class="bi bi-arrow-right"></i> Brazila</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#left-way4" type="button" role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">Brazila <i class="bi bi-arrow-right"></i> Buenos Aires</button>
          </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
          <div class="tab-pane fade show active" id="left-way1" role="tabpanel" aria-labelledby="home-tab">
            <h5 class="card-title">Детали</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время вылета (Berlin)</div>
              <div class="col-lg-9 col-md-8">2023.04.02 21:30</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время прилёта в (London)</div>
              <div class="col-lg-9 col-md-8">2023.04.03 03:00</div>
            </div>
          </div>
          <div class="tab-pane fade" id="left-way12" role="tabpanel" aria-labelledby="profile-tab">
            <h5 class="card-title">Детали</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время вылета (Berlin)</div>
              <div class="col-lg-9 col-md-8">2023.04.02 21:30</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время прилёта в (London)</div>
              <div class="col-lg-9 col-md-8">2023.04.03 03:00</div>
            </div>
          </div>
          <div class="tab-pane fade" id="left-way3" role="tabpanel" aria-labelledby="contact-tab">
            <h5 class="card-title">Детали</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время вылета (Berlin)</div>
              <div class="col-lg-9 col-md-8">2023.04.02 21:30</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время прилёта в (London)</div>
              <div class="col-lg-9 col-md-8">2023.04.03 03:00</div>
            </div>
          </div>
          <div class="tab-pane fade" id="left-way4" role="tabpanel" aria-labelledby="contact-tab">
            <h5 class="card-title">Детали</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время вылета (Berlin)</div>
              <div class="col-lg-9 col-md-8">2023.04.02 21:30</div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Время прилёта в (London)</div>
              <div class="col-lg-9 col-md-8">2023.04.03 03:00</div>
            </div>
          </div>
        </div><!-- End Bordered Tabs Justified -->

      </div>
    </div>

  </div>

  <div class="col-lg-4">



  </div>

@endsection