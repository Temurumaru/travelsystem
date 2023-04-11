@extends('layouts.admin')


@section('title', 'Создать Администратора')
@section('header_title', APP_NAME)
@section('sub_title', 'Создать Администратора')

@section('content')
  
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Форма создания администратора</h5>

        <!-- General Form Elements -->
        <form method="post" action="{{route('CreateAdmin')}}">
          @csrf

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" name="login" minlength="4" maxlength="40" class="form-control" value="{{ old('login') }}" required>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" name="password" minlength="6" maxlength="128" class="form-control" value="{{ old('password') }}" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Полное имя</label>
            <div class="col-sm-10">
              <input type="text" name="full_name" minlength="4" maxlength="40" class="form-control" value="{{ old('full_name') }}" required>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
              <textarea class="form-control" maxlength="140" name="description" style="height: 100px">{{ old('description') }}</textarea>
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