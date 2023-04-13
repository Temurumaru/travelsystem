@extends('layouts.agent')


@section('title', 'Тур '.$tour -> name.' - '.$org -> name)
@section('header_title', APP_NAME)
@section('sub_title', 'Тур '.$tour -> name)

@section('username', 'Teshavoy Teshavoyev')
@section('usersubname', 'Yetti Travel')


@section('content')

  @php

    use ThreadBeanPHP\C as C;

    $agent = C::findOne("agents", "company = ?", [$org -> id]);

    $busy = C::find("busy", "tour = ?", [$tour -> id]);
    $places_rem = $tour -> places;
    foreach ($busy as $item) {
      $places_rem -= $item -> places;
    }

    $start_leave_1 = json_decode($tour -> start_leave_1, true);
    $start_come_2 = json_decode(@$tour -> start_come_2, true);
    $start_leave_2 = json_decode(@$tour -> start_leave_2, true);
    $start_come_3 = json_decode(@$tour -> start_come_3, true);
    $start_leave_3 = json_decode(@$tour -> start_leave_3, true);
    $start_come_4 = json_decode($tour -> start_come_4, true);

    $end_leave_1 = json_decode($tour -> end_leave_1, true);
    $end_come_2 = json_decode(@$tour -> end_come_2, true);
    $end_leave_2 = json_decode(@$tour -> end_leave_2, true);
    $end_come_3 = json_decode(@$tour -> end_come_3, true);
    $end_leave_3 = json_decode(@$tour -> end_leave_3, true);
    $end_come_4 = json_decode($tour -> end_come_4, true);

    if(@$tour -> city_days_2) {
      $days = $tour -> city_days_1 + $tour -> city_days_2;
      $nights = $tour -> city_nights_1 + $tour -> city_nights_2;
    } else {
      $days = $tour -> city_days_1;
      $nights = $tour -> city_nights_1;
    }


    // $date1 = DateTime::createFromFormat('Y-m-d H:i', ($start_come_4['date'].' '.$start_leave_1['time'])); // первая дата
    // $date2 = DateTime::createFromFormat('Y-m-d H:i', ($end_leave_1['date'].' '.$end_leave_1['time'])); // вторая дата

    // $diff = $date1->diff($date2);
    // $total_hours = $diff->h + $diff->days * 24;

    // echo $total_hours; // вывод общего количества часов

  @endphp

  <div class="col-lg-6">
    <div class="card">
      <div class="card-body profile-overview">
        <h5 class="card-title hdr">Путь туда. {{$start_leave_1['city']}} <i class="bi bi-chevron-double-right"></i> {{$start_come_4['city']}}</h5>
        <div class="activity">

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 13:00</div>
            <i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
            <div class="activity-content lead">
              Berlin Вылет
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 20:10</div>
            <i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
            <div class="activity-content lead">
              London Прилёт
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 23:30</div>
            <i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
            <div class="activity-content lead">
              London Вылет
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">6 Апр 09:00</div>
            <i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
            <div class="activity-content lead">
              Istanbul Прилёт
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 23:30</div>
            <i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
            <div class="activity-content lead">
              Istanbul Вылет
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">6 Апр 09:00</div>
            <i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
            <div class="activity-content lead">
              Buenos Aires Прилёт
            </div>
          </div><!-- End activity item-->

        </div>
      </div>
    </div>    
  </div>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body profile-overview">
        <h5 class="card-title hdr">Путь обратно. {{$end_leave_1['city']}} <i class="bi bi-chevron-double-right"></i> {{$end_come_4['city']}}</h5>
        <div class="activity">

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 13:00</div>
            <i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
            <div class="activity-content lead">
              Berlin Вылет
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 20:10</div>
            <i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
            <div class="activity-content lead">
              London Прилёт
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 23:30</div>
            <i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
            <div class="activity-content lead">
              London Вылет
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">6 Апр 09:00</div>
            <i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
            <div class="activity-content lead">
              Istanbul Прилёт
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">5 Апр 23:30</div>
            <i class="bi bi-airplane-fill rot-45 activity-badge text-danger align-self-start"></i>
            <div class="activity-content lead">
              Istanbul Вылет
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead"></div>
            <i class="bi bi-alarm-fill activity-badge text-badge align-self-start"></i>
            <div class="activity-content lead">
              5ч
            </div>
          </div><!-- End activity item-->

          <div class="activity-item d-flex">
            <div class="activite-label lead">6 Апр 09:00</div>
            <i class="bi bi-airplane-fill rot-135 activity-badge text-success align-self-start"></i>
            <div class="activity-content lead">
              Buenos Aires Прилёт
            </div>
          </div><!-- End activity item-->

        </div>
      </div>
    </div>    
  </div>

  <div class="col-lg-6">

    <div class="card">
      <div class="card-body">
        <div class="card-title hdr">Информайия о туре</div>

        <p class="lead-p">
          <b>Город: </b>Медина (<b>8</b> дней, <b>7</b> ночей) <br>
          <b>Питание: </b><b>2</b> раза (в день) <br>
          <b>Отель: </b>Rammstein Hotel ★★★★ <br>
          <b>Расстояние: </b><b>700</b> м <br>
          <b>Гид: </b>Нет <br>
          <b>Трансфер: </b>Есть <br>
        </p>

        <hr>

        <p class="lead-p">
          <b>Город: </b>Мекка (<b>8</b> дней, <b>7</b> ночей) <br>
          <b>Питание: </b><b>2</b> раза (в день) <br>
          <b>Отель: </b>Rammstein Hotel ★★★★ <br>
          <b>Расстояние: </b><b>700</b> м <br>
          <b>Гид: </b>Нет <br>
          <b>Трансфер: </b>Есть <br>
        </p>

        <hr>

        <p class="lead">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit sint dolore accusamus magnam omnis ab velit voluptate earum dicta, consequuntur perspiciatis repellendus veritatis error animi amet ipsum sequi. Et, perferendis?
        </p>
      </div>
    </div>

  </div>

  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <div class="card-title hdr">Бронирование 
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
            <i class="bi bi-eye-fill"></i>
          </button>
        </div>

        <h3 id="price" bonus="50" class="unselectable">Цена тура: <b>1500$</b></h3>

        <div class="row">
          <h3 class="col-md-auto">Всего мест <b>50</b></h3>
          <h3 class="col-md-auto">Свободно <b>42</b></h3>
        </div>
        <hr>
        <form action="" method="post">
          <div class="row mb-2 mx-1">
            <div class="row cnt">
              <div class="col-md-4 lead">
                Забронировать
              </div>
              <div class="col-md-5 my-2">
                <input type="number" class="form-control" name="places" placeholder="Введите кол-во мест" id="" min="0" max="100" step="1">
                
              </div>
              <div class="col-md-3">
                
                <button type="submit" class="btn btn-primary">Забронировать</button>
              </div>
            </div>
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