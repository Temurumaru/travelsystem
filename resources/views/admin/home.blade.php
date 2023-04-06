@extends('layouts.admin')


@section('title', 'Админ панель')
@section('header_title', APP_NAME)
@section('sub_title', '')


@section('content')
  <div class="col-xl-3">

    <div class="card">
      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <h2>Ketmon Ketmonov</h2>
        <h3>Верховный Админ</h3>
      </div>
    </div>

  </div>

  <div class="col-xl-9">

    <div class="col">

      <div class="row">
       
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
   
            <div class="card-body">
              <h5 class="card-title">Места <span>| В общем во всех объявлениях</span></h5>
       
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-airplane-engines"></i>
                </div>
                <div class="ps-3">
                  <h6>500</h6>
                </div>
              </div>
            </div>
       
          </div>
        </div>
       
       <div class="col-xxl-4 col-md-6">
         <div class="card info-card revenue-card">
  
           <div class="card-body">
             <h5 class="card-title">Туров <span>| Всего</span></h5>
      
             <div class="d-flex align-items-center">
               <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-globe-central-south-asia"></i>
               </div>
               <div class="ps-3">
                 <h6>8</h6>
               </div>
             </div>
           </div>
      
         </div>
       </div>
      
       <!-- Customers Card -->
       <div class="col-xxl-4 col-xl-12">
      
         <div class="card info-card customers-card">
      
           <div class="card-body">
             <h5 class="card-title">Агентов <span>| Всего</span></h5>
      
             <div class="d-flex align-items-center">
               <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                 <i class="bi bi-people"></i>
               </div>
               <div class="ps-3">
                 <h6>12</h6>
               </div>
             </div>
      
           </div>
         </div>
      
       </div><!-- End Customers Card -->
        
      </div>

    </div>


    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Список Администраторов</h5>
        
        <button class="btn btn-primary mb-4">Добавить Администратора <i class="bi bi-person-plus-fill"></i></button>
        <!-- Bordered Table -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Имя</th>
              <th scope="col" class="d-none d-lg-block">Описание</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Brandon Jacob</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Bridie Kessler</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Ashleigh Langosh</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Angus Grady</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Raheem Lehner</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Список Компаний</h5>
        
        <button class="btn btn-primary mb-4">Добавить Компанию <i class="bi bi-person-plus-fill"></i></button>
        <!-- Bordered Table -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Название</th>
              <th scope="col">Туров</th>
              <th scope="col" class="d-none d-lg-block">Описание</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Yetti Travel</td>
              <td>2</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Sebzar Tour</td>
              <td>4</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Argentum Way</td>
              <td>3</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Lufthansa</td>
              <td>6</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>S7</td>
              <td>1</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Список Агентов</h5>
        
        <button class="btn btn-primary mb-4">Добавить Агента <i class="bi bi-person-plus-fill"></i></button>
        <!-- Bordered Table -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Имя</th>
              <th scope="col">Компания</th>
              <th scope="col" class="d-none d-lg-block">Описание</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Brandon Jacob</td>
              <td>Yetti Travel</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Bridie Kessler</td>
              <td>Yetti Travel</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Ashleigh Langosh</td>
              <td>Yetti Travel</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">4</th>
              <td>Angus Grady</td>
              <td>Yetti Travel</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
            <tr>
              <th scope="row">5</th>
              <td>Raheem Lehner</td>
              <td>Yetti Travel</td>
              <td class="d-none d-lg-block" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae recusandae rerum corrupti distinctio mollitia atque et in dolorum, facere, animi!</td>
              <td class="col" ><button class="m-1 btn btn-warning"><i class="bi bi-pencil-fill"></i></button><button class="m-1 btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>

  </div>

@endsection