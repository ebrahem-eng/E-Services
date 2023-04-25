<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
                  <span>
                   الملف الشخصي
                  </span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li>
                <a
                  class="dropdown-item d-flex align-items-center"
                  href="{{route('profile.show')}}"
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
            
              <form method="POST" action="{{ route('logout') }}" x-data >
                 @csrf                
                <span> <button  class="dropdown-item d-flex align-items-center" type="submit" >
                 <i class="bi bi-box-arrow-right"></i>تسجيل الخروج</button>
                 </span>
             </form>
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
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications"
            >
              <li class="dropdown-header">
              

              </li>
             
                  @foreach(Auth::User()->unreadNotifications as $result)
              <li class="notification-item" >
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
              
                <h4>{{$result->data['name_user']}}</h4>
                  <p>{{$result->data['name_translate']}}</p>
                  <p>{{$result->created_at}}</p>


                  <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                 <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                 <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                 </svg>
                  </a>
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
          href="#"
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
          <a class="nav-link" href="{{route('employe.dashboard')}}">
          <i class="bi bi-house-door"></i>
            <span>الرئيسية</span>
          </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#components-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-translate"></i></i><span>طلبات الترجمة</span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="components-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
           
            <li>
              <a href="{{route('employe.translate.graduation')}}">
                <i class="bi bi-circle"></i><span>مشاريع تخرج</span>
              </a>
            </li>
            <li>
              <a href="{{route('employe.translate.cv')}}">
                <i class="bi bi-circle"></i><span>سيرة ذاتية</span>
              </a>
            </li>
     
          </ul>
        </li>
        <!-- End Components Nav -->

        <li class="nav-item">
        
            
            <a href="{{route('Employe.Write.Content')}}"
             class="nav-link collapsed">
            <i class="bi bi-journal-text"></i>
            <span>طلبات كتابة المحتوى</span>
            </a>
          
       
        </li>
        <!-- End Forms Nav -->

        <li class="nav-item">
        <a href="{{route('Employe.Write.Article')}}"
             class="nav-link collapsed">
            <i class="bi bi-journal-text"></i>
            <span>طلبات كتابة المقالات</span>
            </a>
        </li>
        <!-- End Tables Nav -->

        <li class="nav-item">
        <a href="{{route('Employe.Write.Research')}}"
             class="nav-link collapsed">
            <i class="bi bi-journal-text"></i>
            <span>طلبات كتابة الابحاث</span>
            </a>
          
        </li>
        <!-- End Charts Nav -->

        <li class="nav-item">
        <a href="{{route('Employe.Edit.Check')}}"
             class="nav-link collapsed">
             <i class="bi bi-binoculars"></i></i>
            <span>طلبات تدقيق وتحرير لغوي</span>
            </a>
        </li>
              
        <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Employe.Ask.Us')}}">
          <i class="bi bi-question-circle"></i>
          <span>طلبات تحكيم واستشارة </span>
        </a>
      </li>
        <!-- End Icons Nav -->
       
              <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Employe.Write.Cv')}}">
          <i class="bi bi-person-video2"></i>
          <span> طلبات كتابة سيرة ذاتية</span>
        </a>
      </li>
        <!-- End Icons Nav -->

             <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Employe.Power.Point')}}">
         <i class="bi bi-easel"></i>
          <span>طلبات انشاء عروض تقديمية</span>
        </a>
      </li>
        
        <!-- End Icons Nav -->
    
        
          <!-- End Icons Nav -->

          <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Employe.Complaints')}}">
         <i class="bi bi-exclamation-octagon"></i>
          <span>الشكاوي</span>
        </a>
      </li>
        
        <!-- End Icons Nav -->

      </ul>
    </aside>
    <!-- End Sidebar-->

  
    <!-- Vendor JS Files -->
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>

  </body>
</html>
