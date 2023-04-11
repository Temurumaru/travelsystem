@extends('layouts.admin')


@section('title', 'Изменить Администратора')
@section('header_title', APP_NAME)
@section('sub_title', 'Изменить Администратора')


@section('content')
  
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Форма изменения администратора</h5>

        <!-- General Form Elements -->
        <form method="post" action="{{route('UpdateAdmin')}}">
          @csrf

          <input type="hidden" name="id" value="{{$admin -> id}}">

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" name="login" minlength="4" maxlength="40" class="form-control" value="{{ $admin -> login }}" required>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Полное имя</label>
            <div class="col-sm-10">
              <input type="text" name="full_name" minlength="4" maxlength="40" class="form-control" value="{{ $admin -> full_name }}" required>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
              <textarea class="form-control" maxlength="140" name="description" style="height: 100px">{{ $admin -> description }}</textarea>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Изменить</label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-warning">Нажать</button>
            </div>
          </div>

        </form><!-- End General Form Elements -->

      </div>
    </div>
  </div>

@endsection