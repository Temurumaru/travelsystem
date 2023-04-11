@extends('layouts.admin')


@section('title', 'Изменить Агента')
@section('header_title', APP_NAME)
@section('sub_title', 'Изменить Агента')


@section('content')
  
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Форма создания агента</h5>

        <!-- General Form Elements -->
        <form method="post" action="{{route('UpdateAgent')}}">

          @csrf

          <input type="hidden" name="id" value="{{$agent -> id}}">

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Компания</label>
            <div class="col-sm-10">
              <select class="form-select" name="org" aria-label="Default select example" required>
                @foreach ($orgs as $org)  
                  <option {{(($agent -> company == $org -> id) ? "selected" : '')}} value="{{$org -> id}}">{{$org -> name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" name="login" minlength="4" maxlength="40" class="form-control" value="{{$agent -> login}}" required>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="description" maxlength="140" style="height: 100px">{{$agent -> description}}</textarea>
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