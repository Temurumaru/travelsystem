@extends('layouts.admin')


@section('title', 'Создать Агента')
@section('header_title', APP_NAME)
@section('sub_title', 'Создать Агента')

@section('username', 'Ketmon Ketmonov')
@section('usersubname', 'Верховный Админ')


@section('content')
  
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Форма создания агента</h5>

        <!-- General Form Elements -->
        <form>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Компания</label>
            <div class="col-sm-10">
              <select class="form-select" aria-label="Default select example">
                <option selected="">Нажмите чтобы открыть список</option>
                <option value="1">Yetti Travel</option>
                <option value="2">Lufthansa</option>
                <option value="3">S7</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" name="login" class="form-control">
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control">
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="description" style="height: 100px"></textarea>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Создать</label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Нажать</button>
            </div>
          </div>

        </form><!-- End General Form Elements -->

      </div>
    </div>
  </div>

@endsection