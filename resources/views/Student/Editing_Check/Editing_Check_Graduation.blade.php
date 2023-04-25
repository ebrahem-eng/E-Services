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
              <li>
                <hr class="dropdown-divider" />
              </li>
                  @foreach(Auth::User()->unreadNotifications as $result)
              <li class="notification-item" >
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  
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
          <a class="nav-link" href="{{route('dashboard')}}">
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
            <i class="bi bi-translate"></i></i><span>رفع نص للترجمة</span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="components-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
           
            <li>
              <a href="{{route('Final-project')}}">
                <i class="bi bi-circle"></i><span>مشاريع تخرج</span>
              </a>
            </li>
            <li>
              <a href="{{route('Cv_translate')}}">
                <i class="bi bi-circle"></i><span>سيرة ذاتية</span>
              </a>
            </li>
     
          </ul>
        </li>
        <!-- End Components Nav -->

        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#forms-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-journal-text"></i><span>طلب كتابة محتوى</span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="forms-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="{{route('Market_content')}}">
                <i class="bi bi-circle"></i><span>محتوى تسويقي</span>
              </a>
            </li>

          </ul>
        </li>
        <!-- End Forms Nav -->

        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#tables-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-layout-text-window-reverse"></i><span> كتابة مقالات</span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="tables-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="{{route('Academic_Articles')}}">
                <i class="bi bi-circle"></i><span>أكاديمية</span>
              </a>
            </li>
            <li>
              <a href="{{route('Literary_Articles')}}">
                <i class="bi bi-circle"></i><span>أدبية/إبداعية</span>
              </a>
            </li>
                        <li>
              <a href="{{route('Technique_Articles')}}">
                <i class="bi bi-circle"></i><span>تقنية</span>
              </a>
            </li>
                        <li>
              <a href="{{route('Marketing_Articles')}}">
                <i class="bi bi-circle"></i><span>تسويقية</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Tables Nav -->

        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#charts-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-search"></i><span> كتابة أبحاث</span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="charts-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="{{route('Research_Academic')}}">
                <i class="bi bi-circle"></i><span>أكاديمية</span>
              </a>
            </li>
            <li>
              <a href="{{route('Research_Scientific')}}">
                <i class="bi bi-circle"></i><span>علمية</span>
              </a>
            </li>
            <li>
              <a href="{{route('Research_Economic')}}">
                <i class="bi bi-circle"></i><span>اقتصادية</span>
              </a>
            </li>
                        <li>
              <a href="{{route('Research_Legal')}}">
                <i class="bi bi-circle"></i><span>قانونية</span>
              </a>
            </li>
                        <li>
              <a href="{{route('Research_Seminars')}}">
                <i class="bi bi-circle"></i><span>حلقات بحث</span>
              </a>
            </li>
                        <li>
              <a href="charts-echarts.html">
                <i class="bi bi-circle"></i><span>ملخصات</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Charts Nav -->

        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#eyes-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-binoculars"></i></i><span>تدقيق وتحرير لغوي</span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="eyes-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="{{route('Editing_Check_Text')}}">
                <i class="bi bi-circle"></i><span>نصوص</span>
              </a>
            </li>
            <li>
              <a href="{{route('Editi_Check_Articles')}}">
                <i class="bi bi-circle"></i><span>مقالات</span>
              </a>
            </li>
            <li>
              <a href="{{route('Editing_Check_Graduation')}}">
                <i class="bi bi-circle"></i><span>مشاريع تخرج</span>
              </a>
            </li>
                        <li>
              <a href="{{route('Editing_Check_Research')}}">
                <i class="bi bi-circle"></i><span>أبحاث</span>
              </a>
            </li>
          </ul>
        </li>
              
        <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Ask_Us')}}">
          <i class="bi bi-question-circle"></i>
          <span>تحكيم واستشارة</span>
        </a>
      </li>
        <!-- End Icons Nav -->
       
              <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('Write_Cv')}}">
          <i class="bi bi-person-video2"></i>
          <span>كتابة سيرة ذاتية</span>
        </a>
      </li>
        <!-- End Icons Nav -->

             <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('PowerPoint')}}">
         <i class="bi bi-easel"></i>
          <span>إنشاءعروض تقديمية</span>
        </a>
      </li>
        
        <!-- End Icons Nav -->
    

      </ul>
    </aside>
    <!-- End Sidebar-->


  <main id="main" class="main" dir="rtl">

    <div class="pagetitle">
      <h1> تدقيق و تحرير لغوي</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
          <li class="breadcrumb-item"> تدقيق وتحرير لغوي  </li>
          <li class="breadcrumb-item active"> مشاريع تخرج</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

<section>
    <div class="row">
   <div class="col-lg-9 m-auto">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title ">تدقيق مشاريع تخرج  </h5>
            <p>التنقيح أو التدقيق اللغوي هو تصحيح النصوص المكتوبة أو المنطوقة من الناحية الإملائية والنحوية والصرفية، وإضافة علامات الوقف والترقيم. برزت الحاجةُ لوظيفةِ التدقيقِ اللغوي بعد دخول الصحافة والمطبوعات إِلَىٰ البلاد العربية، وظهور الأخطاء المطبعية التي تسببتْ في الإحراج لكثير من الجهات.</p>


            @if(session('message'))
                <div class="alert alert-success">
                  {{session('message')}}
                </div>
                {{header("refresh : 3")}}
                @endif
                
                
              <!-- Browser Default Validation -->
              <form class="row g-3" action="{{route('store_Editing_Check_Graduation')}}" method="POST" enctype="multipart/form-data">
                     @csrf

                   <div class="mb-12">
                   <label for="formFile" class="form-label">قم باختيار الملف المراد <span class="fw-bold">تَدْقِيقَهُ</span></label>
                     <input class="form-control" type="file" id="formFile" name="file_check_graduation" required>
                   </div>

                <div class="col-12 d-flex justify-content-center">
                  <button class="btn btn-primary " type="submit">تأكيد</button>
                </div>
              </form>
              <!-- End Browser Default Validation -->

            </div>
          </div>

        </div>
        </div>
</section>

  </main><!-- End #main -->

   <!-- Vendor JS Files -->
   <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('assets/js/main.js')}}"></script>
  </body>
</html>
