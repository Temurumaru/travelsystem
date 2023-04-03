@extends('layouts.agent')


@section('title', 'Тур [Название]')
@section('header_title', APP_NAME)
@section('sub_title', 'Тур [Название]')


@section('content')

  <div class="col-lg-8">
    <div class="card">
      <div class="card-body profile-overview">
        <h5 class="card-title">Путь туда. Berlin <i class="bi bi-chevron-double-right"></i> Buenos Aires</h5>
        <div class="activity">

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 13:00</div>
            <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
            <div class="activity-content lead">
              Berlin Вылет
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 20:10</div>
            <i class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
            <div class="activity-content lead">
              London Посадка
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 23:30</div>
            <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
            <div class="activity-content lead">
              Voluptates corrupti molestias voluptatem
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">6 Апр 09:00</div>
            <i class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
            <div class="activity-content lead">
              Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
            </div>
          </div><!-- End activity item-->

        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body profile-overview">
        <h5 class="card-title">Путь Обратно. Buenos Aires <i class="bi bi-chevron-double-right"></i> Berlin</h5>

      </div>
    </div>
    
  </div>

  <div class="col-lg-4">

    <div class="card">
      <div class="card-body">
        <div class="card-title">Прибывание</div>

        <p>
          <b>Время прибывания: </b><b>8</b>дней <b>7</b>ночей <br>
          <b>Питание: </b><b>2</b> раза (в день) <br>
          <b>Отель: </b>Rammstein Hotel ★★★★ <br>
          <b>Достопримечательности: </b>Медина (<b>5</b> дней) <br>
          <b>Трансфер(Гид): </b>ArgentumWay <br>
        </p>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="card-title">Бронирование 
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
            <i class="bi bi-eye-fill"></i>
          </button>
        </div>

        <h2 id="price" bonus="50" class="mx-2 unselectable">Цена тура: <b>1500$</b></h2>

        <div class="row container">
          <h3 class="col-md-auto">Всего мест <b>50</b></h3>
          <h3 class="col-md-auto">Свободно <b>42</b></h3>
        </div>
        <hr>
        <form action="" method="post">
          <div class="row mb-2 mx-1">
            <h4>Заняли <b id="place_num">1</b> мест</h4>
            <input type="range" class="form-range" id="place_slider" min="1" max="5" step="1" value="1" id="customRange2">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Забронировать</button>
          </div>
        </form>
      </div>
    </div>

  </div>

  <div class="modal fade" id="largeModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Список забронировавших Агентов</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-borderless">
            <tbody class="agent_tour_element">
              <tr>
                <td><img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="50px"></td>
                <td><b>Yetti Travel<b></td>
                <td>Teshavoy Teshavoyev</td>
                <td><b>28</b> мест</td>
              </tr>
              <tr>
                <td><img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="50px"></td>
                <td><b>Yetti Travel<b></td>
                <td>Teshavoy Teshavoyev</td>
                <td><b>28</b> мест</td>
              </tr>
              <tr>
                <td><img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="50px"></td>
                <td><b>Yetti Travel<b></td>
                <td>Teshavoy Teshavoyev</td>
                <td><b>28</b> мест</td>
              </tr>
              <tr>
                <td><img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="50px"></td>
                <td><b>Yetti Travel<b></td>
                <td>Teshavoy Teshavoyev</td>
                <td><b>28</b> мест</td>
              </tr>
              <tr>
                <td><img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="50px"></td>
                <td><b>Yetti Travel<b></td>
                <td>Teshavoy Teshavoyev</td>
                <td><b>28</b> мест</td>
              </tr>
              <tr>
                <td><img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="50px"></td>
                <td><b>Yetti Travel<b></td>
                <td>Teshavoy Teshavoyev</td>
                <td><b>28</b> мест</td>
              </tr>
              <tr>
                <td><img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" width="50px"></td>
                <td><b>Yetti Travel<b></td>
                <td>Teshavoy Teshavoyev</td>
                <td><b>28</b> мест</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
      </div>
    </div>
  </div>

@endsection