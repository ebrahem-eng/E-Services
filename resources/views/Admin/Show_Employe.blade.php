<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title> الموظفين - SPU Translate</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />



    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Almarai&family=Lateef&display=swap" rel="stylesheet">
     <!-- Vendor CSS Files -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link
      href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}"
      rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header
    
      id="header"
      class="header fixed-top d-flex align-items-center justify-content-between"
    >
      <nav class="header-nav">
        <ul class="d-flex align-items-center">
          <li class="nav-item dropdown">
            <a
              class="nav-link nav-profile d-flex align-items-center pe-0"
              href="#"
              data-bs-toggle="dropdown"
            >
              <img
              src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                class="rounded-circle"
              />
              <span class="d-none d-md-block dropdown-toggle pe-4">{{Auth()->user()->name}}</span
              > </a
            ><!-- End Profile Iamge Icon -->

            <ul
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile"
            >
              <li class="dropdown-header">
                <h6>{{Auth()->user()->name}}</h6>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a
                  class="dropdown-item d-flex align-items-center"
                 href="{{route('profile.show')}}"
                >
                  <i class="bi bi-person"></i>
                  <span>الملف الشخصي</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="users-profile.html"
                >
                  <i class="bi bi-gear"></i>
                  <span>الإعدادات</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>تسجيل الخروج</span>
                </a>
              </li>
            </ul>
            <!-- End Profile Dropdown Items -->
          </li>
          <!-- End Profile Nav -->
          <li class="nav-item dropdown" >
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-bell"></i>
              <span class="badge bg-primary badge-number">{{Auth::User()->unreadNotifications->count()}}</span> </a
            ><!-- End Notification Icon -->

            <ul
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications list-group "
            >
              <li>
                <hr class="dropdown-divider" />
              </li>
              @foreach(Auth::User()->unreadNotifications as $result)
              <li class="notification-item" >
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4>طلبك قيد الدراسة</h4>
                  <p> ولانك متخازل جدا في الدفع تم رفض طلب الترجمة لعدم وجود رصيد كافي </p>
                  <p>منذ 30 دقيقة</p>
                </div>
              </li>
              @endforeach
              <li>
                <hr class="dropdown-divider" />
              </li>
  
            </ul>
            <!-- End Notification Dropdown Items -->
          </li>
          <!-- End Notification Nav -->

 
      </nav>
      <!-- End Icons Navigation -->
      <div class="d-flex align-items-center justify-content-between me-3">
        <a
          href="admin-index.html"
          class="logo d-flex align-items-center justify-content-end"
        >
          <h1 class="spu">SPU Translate</h1>
          <img src="{{asset('assets/img/logo.png')}}" alt="" />
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <!-- End Logo -->
    </header>
    <!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar" dir="rtl">
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link  collapsed" href="{{route('admin.dashboard')}}">
          <i class="bi bi-house-door"></i>
            <span>الرئيسية</span>
          </a>
        </li>
        <!-- End Dashboard Nav -->


              
        <!-- End Icons Nav -->
       
        <li class="nav-item">
          <a
            class="nav-link  "
            data-bs-target="#eyes-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-binoculars"></i></i><span> الموظفين </span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="eyes-nav"
            class="nav-content collapse show"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="{{route('admin.give_employe')}}">
                <i class="bi bi-circle"></i><span>إعطاء صلاحيات لموظف</span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.addemploye')}}">
                <i class="bi bi-circle"></i><span>إضافة موظف</span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.show_employe')}}"  class="active">
                <i class="bi bi-circle"></i><span> جدول الموظفين</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Icons Nav -->

             <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.analytic')}}">
        <i class="bi bi-bar-chart-line-fill"></i>
          <span> البيانات التحليلية</span>
        </a>
      </li>
        <!-- End Icons Nav -->
                 <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('admin.archives_employe')}}">
        <i class="bi bi-card-list"></i>
          <span>  أرشيف الموظفين</span>
        </a>
      </li>

      </ul>
    </aside>
    <!-- End Sidebar-->
    <main id="main" class="main"  dir="rtl">

    <div class="pagetitle">
      <h1>الموظفين </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a></li>
           <li class="breadcrumb-item ">الموظفين</li>
          <li class="breadcrumb-item active">جدول الموظفين</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section" >
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">جدول الموظفين</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم</th> 
                    <th scope="col">الرمز الوظيفي</th>
                    <th scope="col"> الحالة</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($employe as $result)
                  <tr>
                    <th scope="row">{{$result->id}}</th>
                    <td>{{$result->name}}</td>                                     
                    <td>{{$result->id}}</td>                    
                    <td>{{$result->UserType}}</td>
                    <td>{{$result->email}}</td>
                    
                    <td class="text-center"><a href="{{route('admin.edite_employe' , $result->id)}}"><i class="bi bi-pencil-square fs-6"></i></a></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <i class="bi bi-person-dash-fill"></i>
                             </button></td> 
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
      <!-- Button trigger modal -->

<!-- Modal -->
@foreach($employe as $result)
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">حذف بيانات الموظف بالكامل</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       هل أنت متأكد من حذف جميع بيانات الموظف ؟
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>

        <form action="{{route('delete_employe' , $result->id)}}" method="POST">
          @method('delete')
          @csrf
        <button type="submit" class="btn btn-primary">حذف</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
    </section>

  </main><!-- End #main -->
<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Template Main JS File -->
      <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
  </body>
</html>
<!-- <i class="bi bi-person-add"></i> -->
