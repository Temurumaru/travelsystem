@extends('layouts.admin')


@section('title', 'Изменить Тур')
@section('header_title', APP_NAME)
@section('sub_title', 'Изменить Тур')

@section('username', 'Ketmon Ketmonov')
@section('usersubname', 'Верховный Админ')


@section('content')
  
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Форма изменения тура Тура</h5>

        <form class="row g-3">

          <h5 class="mt-4 mb-0"><b>Выбор тур оператора</b></h5>
          <div class="col-md-12">
            <select class="form-select" aria-label="Default select example">
              <option selected="">Нажмите чтобы открыть список</option>
              <option value="1">Yetti Travel</option>
              <option value="2" selected>Lufthansa</option>
              <option value="3">S7</option>
            </select>
          </div>

          <hr>

          <h4 class="mt-0 mb-0"><b>Туда</b></h4>

          <h5 class="mt-4 mb-0"><b>Вылет</b></h5>
          <div class="col-md-4">
            <label for="leaveDate" class="form-label">Дата</label>
            <input type="date" class="form-control" id="leaveDate">
          </div>
          <div class="col-md-4">
            <label for="leaveTime" class="form-label">Время</label>
            <input type="Time" class="form-control" id="leaveTime">
          </div>
          <div class="col-md-4">
            <label for="leaveCity" class="form-label">Город</label>
            <input type="text" maxlength="30" class="form-control" id="leaveCity">
          </div>

          <div class="row g-3">
          
          </div>

          <div class="col-md-12 mb-2 mt-4 hidden">
            <button type="button" class="btn btn-danger">Удалить пересадку <i class="bi bi-dash-lg"></i></button>
          </div>

          <div class="col-md-12 mb-2 mt-4">
            <button type="button" class="btn btn-success">Добавить пересадку <i class="bi bi-plus-lg"></i></button>
          </div>

          <h5 class="mt-4 mb-0"><b>Прилёт</b></h5>
          <div class="col-md-4">
            <label for="leaveDate" class="form-label">Дата</label>
            <input type="date" class="form-control" id="leaveDate">
          </div>
          <div class="col-md-4">
            <label for="leaveTime" class="form-label">Время</label>
            <input type="Time" class="form-control" id="leaveTime">
          </div>
          <div class="col-md-4">
            <label for="leaveCity" class="form-label">Город</label>
            <input type="text" maxlength="30" class="form-control" id="leaveCity">
          </div>

          <hr>

          <h4 class="mt-0 mb-0"><b>Обратно</b></h4>

          <h5 class="mt-4 mb-0"><b>Вылет</b></h5>
          <div class="col-md-4">
            <label for="leaveDate" class="form-label">Дата</label>
            <input type="date" class="form-control" id="leaveDate">
          </div>
          <div class="col-md-4">
            <label for="leaveTime" class="form-label">Время</label>
            <input type="Time" class="form-control" id="leaveTime">
          </div>
          <div class="col-md-4">
            <label for="leaveCity" class="form-label">Город</label>
            <input type="text" maxlength="30" class="form-control" id="leaveCity">
          </div>

          <div class="row g-3">
          
          </div>

          <div class="col-md-12 mb-2 mt-4 hidden">
            <button type="button" class="btn btn-danger">Удалить пересадку <i class="bi bi-dash-lg"></i></button>
          </div>

          <div class="col-md-12 mb-2 mt-4">
            <button type="button" class="btn btn-success">Добавить пересадку <i class="bi bi-plus-lg"></i></button>
          </div>

          <h5 class="mt-4 mb-0"><b>Прилёт</b></h5>
          <div class="col-md-4">
            <label for="leaveDate" class="form-label">Дата</label>
            <input type="date" class="form-control" id="leaveDate">
          </div>
          <div class="col-md-4">
            <label for="leaveTime" class="form-label">Время</label>
            <input type="Time" class="form-control" id="leaveTime">
          </div>
          <div class="col-md-4">
            <label for="leaveCity" class="form-label">Город</label>
            <input type="text" maxlength="30" class="form-control" id="leaveCity">
          </div>

          <hr>

          <h4 class="mt-0 mb-0"><b>Города</b></h4>


          <div class="col-md-4">
            <label for="city_name_1" class="form-label">Название</label>
            <input type="text" maxlength="40" class="form-control" id="city_name_1">
          </div>
          <div class="col-md-4">
            <label for="city_days_1" class="form-label">Дней</label>
            <input type="number" min="0" class="form-control" id="city_days_1">
          </div>
          <div class="col-md-4">
            <label for="city_nights_1" class="form-label">Ночей</label>
            <input type="number" min="0" class="form-control" id="city_nights_1">
          </div>

          <div class="col-md-3">
            <label for="distance_city_1" class="form-label">Расстояние</label>
            <input type="number" min="0" class="form-control" id="distance_city_1">
          </div>
          <div class="col-md-3">
            <label for="city_eats_1" class="form-label">Питание</label>
            <input type="number" min="0" class="form-control" id="city_eats_1">
          </div>
          <div class="col-md-3">
            <label for="city_hotel_1" class="form-label">Отель</label>
            <input type="text" class="form-control" id="city_hotel_1">
          </div>
          <div class="col-md-3">
            <label for="city_hotel_stars_1" class="form-label">Звёзды</label>
            <input type="number" min="0" max="7" class="form-control" id="city_hotel_stars_1">
          </div>

          <div class="row g-3">

          </div>

          <div class="col-md-12 mb-2 mt-4 hidden">
            <button type="button" class="btn btn-danger">Удалить город <i class="bi bi-dash-lg"></i></button>
          </div>
          
          <div class="col-md-12 mb-2 mt-4">
            <button type="button" class="btn btn-success">Добавить город <i class="bi bi-plus-lg"></i></button>
          </div>
          
          <hr>

          <div class="col-md-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" min="0" class="form-control" id="price">
          </div>
          <div class="col-md-3">
            <label for="bonus" class="form-label">Бонус</label>
            <input type="number" min="0" class="form-control" id="bonus">
          </div>
          <div class="col-md-3">
            <label for="places" class="form-label">Кол-во мест</label>
            <input type="number" min="0" class="form-control" id="places">
          </div>
          <div class="col-md-3">
            <label for="places_limit" class="form-label">Ограничение на бронь</label>
            <input type="number" min="0" class="form-control" id="places_limit">
          </div>

          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="transfer" id="transfer">
              <label class="form-check-label" for="transfer">
                Трансфер
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="guide" id="guide">
              <label class="form-check-label" for="guide">
                Гид
              </label>
            </div>
          </div>

          <textarea class="form-control" placeholder="Напишите комментарий" name="description" style="height: 100px;"></textarea>

          <div class="text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
              <i class="bi bi-eye-fill"></i>
            </button>
            <button type="submit" class="btn btn-success">Сохранить <i class="bi bi-download"></i></button>
            <button type="submit" class="btn btn-danger">Завершить <i class="bi bi-calendar2-x-fill"></i></button>
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