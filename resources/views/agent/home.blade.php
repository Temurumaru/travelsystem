@extends('layouts.agent')


@section('title', 'Агент панель')
@section('header_title', APP_NAME)
@section('sub_title', '')


@section('content')
  <div class="col-xl-4">

    <div class="card">
      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <h2>Teshavoy Teshavoyev</h2>
        <h3>Yetti Travel</h3>
        <div class="social-links mt-2">
          <a href="mailto:[email]"><i class="bi bi-envelope-at-fill"></i></a>
          <a href="tel:[phone]"><i class="bi bi-phone-fill"></i></a>
          <a href="https://t.me/[tag]"><i class="bi bi-telegram"></i></a>
        </div>
      </div>
    </div>

  </div>

  <div class="col-xl-8">

    <div class="card">
      <div class="card-body pt-3">
        <!-- Bordered Tabs -->
        <ul class="nav nav-tabs nav-tabs-bordered">

          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Обзор</button>
          </li>

          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Редактировать профиль</button>
          </li>

          {{-- <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Настройки</button>
          </li> --}}

        </ul>
        <div class="tab-content pt-2">

          <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <h5 class="card-title">Описание</h5>
            <p class="small fst-italic">Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь ласковых хозяев и тёплый кров. Один из проверенных способов это сделать — помочь благотворительному фонду «Луч Добра». Благодаря их труду ежегодно сотни питомцев находят свой новый дом.</p>

            <h5 class="card-title">Детали</h5>

            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Полное имя</div>
              <div class="col-lg-9 col-md-8">Teshavoy Teshavoyev</div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Компания</div>
              <div class="col-lg-9 col-md-8">Yetti Travel</div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Телефон</div>
              <div class="col-lg-9 col-md-8">+998xxxxxxxxx</div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Э.почта</div>
              <div class="col-lg-9 col-md-8">xxxxxxx@example.com</div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Telegram</div>
              <div class="col-lg-9 col-md-8">@[tag]</div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Адрес</div>
              <div class="col-lg-9 col-md-8">Nurahshan H.Yuldasheva 73</div>
            </div>

          </div>

          <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

            <!-- Profile Edit Form -->
            <form method="post" >
              <div class="row mb-3">
                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Аватар профиля</label>
                <div class="col-md-8 col-lg-9">
                  <img src="[avatar_path]" id="avatar_preview" alt="Profile" onerror="this.src = '/assets/img/profile-img.jpg'">
                  <div class="pt-2">
                    <input type="hidden" name="avatar_state" id="avatar_state">
                    <input type="file" name="avatar" id="file" accept="image/jpeg, image/png, image/jpg" style="display:none;">
                    <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" onclick="document.getElementById('file').click()"><i class="bi bi-upload"></i></a>
                    <a href="#" id="file_remove" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Полное имя</label>
                <div class="col-md-8 col-lg-9">
                  <input name="fullName" type="text" class="form-control" id="fullName" value="Teshavoy Teshavoyev">
                </div>
              </div>

              <div class="row mb-3">
                <label for="about" class="col-md-4 col-lg-3 col-form-label">Описание</label>
                <div class="col-md-8 col-lg-9">
                  <textarea name="about" class="form-control" id="about" style="height: 100px" maxlength="300">Мы любим животных и стараемся поддерживать тех из них, кому не посчастливилось иметь ласковых хозяев и тёплый кров. Один из проверенных способов это сделать — помочь благотворительному фонду «Луч Добра». Благодаря их труду ежегодно сотни питомцев находят свой новый дом.</textarea>
                </div>
              </div>

              <div class="row mb-3">
                <label for="company" class="col-md-4 col-lg-3 col-form-label">Компания</label>
                <div class="col-md-8 col-lg-9">
                  <input name="company" type="text" class="form-control" id="company" value="Yetti Travel">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Телефон</label>
                <div class="col-md-8 col-lg-9">
                  <input name="phone" type="text" class="form-control" id="Phone" value="+998xxxxxxxxx">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Email" class="col-md-4 col-lg-3 col-form-label">Э.почта</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="email" class="form-control" id="Email" value="xxxxxxxxxx@example.com">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Адрес</label>
                <div class="col-md-8 col-lg-9">
                  <input name="address" type="text" class="form-control" id="Address" value="Nurahshan H.Yuldasheva 73">
                </div>
              </div>

              <div class="row mb-3">
                <label for="Telegram" class="col-md-4 col-lg-3 col-form-label">Telegram </label>
                <div class="col-md-8 col-lg-9">
                  <input name="telegram" type="text" class="form-control" id="Telegram" value="xxxxxxx">
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
              </div>
            </form><!-- End Profile Edit Form -->

          </div>

          <div class="tab-pane fade pt-3" id="profile-settings">

            <!-- Settings Form -->
            <form>

              <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                <div class="col-md-8 col-lg-9">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="changesMade" checked>
                    <label class="form-check-label" for="changesMade">
                      Changes made to your account
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="newProducts" checked>
                    <label class="form-check-label" for="newProducts">
                      Information on new products and services
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="proOffers">
                    <label class="form-check-label" for="proOffers">
                      Marketing and promo offers
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                    <label class="form-check-label" for="securityNotify">
                      Security alerts
                    </label>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form><!-- End settings Form -->

          </div>

        </div><!-- End Bordered Tabs -->

      </div>
    </div>

  </div>

  <div class="col">

    <div class="row">
     <!-- Sales Card -->
     <div class="col-xxl-4 col-md-6">
       <div class="card info-card sales-card">

         <div class="card-body">
           <h5 class="card-title">Осталось <span>| Всего</span><h5>
    
           <div class="d-flex align-items-center">
             <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
               <i class="bi bi-airplane-engines"></i>
             </div>
             <div class="ps-3">
               <h6>145 мест из 200</h6>
             </div>
           </div>
         </div>
    
       </div>
     </div><!-- End Sales Card -->
    
     <!-- Revenue Card -->
     <div class="col-xxl-4 col-md-6">
       <div class="card info-card revenue-card">

         <div class="card-body">
           <h5 class="card-title">Баланс</h5>
    
           <div class="d-flex align-items-center">
             <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
               <i class="bi bi-currency-dollar"></i>
             </div>
             <div class="ps-3">
               <h6>$3,264</h6>
             </div>
           </div>
         </div>
    
       </div>
     </div><!-- End Revenue Card -->
    
     <!-- Customers Card -->
     <div class="col-xxl-4 col-xl-12">
    
       <div class="card info-card customers-card">
    
         <div class="card-body">
           <h5 class="card-title">Агент забронировал <span>| Всего</span></h5>
    
           <div class="d-flex align-items-center">
             <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
               <i class="bi bi-people"></i>
             </div>
             <div class="ps-3">
               <h6>55 мест</h6>
             </div>
           </div>
    
         </div>
       </div>
    
     </div><!-- End Customers Card -->
      
    </div>

    {{-- <div class="card">
      <div class="card-body">
        <div class="card-title">Hello!</div>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, aliquam, debitis nulla rem, cupiditate error doloremque sit ea aspernatur reprehenderit blanditiis commodi ipsa fugiat aliquid quos culpa maiores sunt alias?
        </p>
      </div>
    </div> --}}
  </div>

@endsection