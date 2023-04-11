@extends('layouts.admin')


@section('title', 'Создать Агента')
@section('header_title', APP_NAME)
@section('sub_title', 'Создать Агента')


@section('content')
  
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Форма создания агента</h5>

        <!-- General Form Elements -->
        <form method="post" action="{{route('CreateAgent')}}">

          @csrf

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Компания</label>
            <div class="col-sm-10">
              <select class="form-select" name="org" aria-label="Default select example" required>
                <option selected value="">Нажмите чтобы открыть список</option>
                @foreach ($orgs as $org)  
                  <option {{((old('org') == $org -> id) ? "selected" : '')}} value="{{$org -> id}}">{{$org -> name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" name="login" minlength="4" maxlength="40" class="form-control" value="{{old('login')}}" required>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" name="password" minlength="6" maxlength="128" class="form-control" required>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="description" maxlength="140" style="height: 100px">{{old('dascription')}}</textarea>
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