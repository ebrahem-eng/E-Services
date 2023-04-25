<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> البيانات التحليلية - SPU Translate</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="{{asset('assetss/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assetss/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
 <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Almarai&family=Lateef&display=swap" rel="stylesheet">


  <!-- Vendor CSS Files -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
   
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> 
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">


  <!-- Template Main CSS File -->
 
  <link href="{{asset('assetss/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications list-group ">
            <li class="dropdown-header">
              You have {{Auth::User()->unreadNotifications->count()}} new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              @foreach(Auth::User()->unreadNotifications as $result)
              <li class="notification-item" >
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4></h4>
                  <p></p>
                  <p></p>
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
          <a class="nav-link collapsed" href="{{route('admin.dashboard')}}">
          <i class="bi bi-house-door"></i>
            <span>الرئيسية</span>
          </a>
        </li>
        <!-- End Dashboard Nav -->


              
        <!-- End Icons Nav -->
       
        <li class="nav-item">
          <a
            class="nav-link  collapsed"
            data-bs-target="#eyes-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-binoculars"></i></i><span> الموظفين </span
            ><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="eyes-nav"
            class="nav-content collapse"
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
              <a href="{{route('admin.show_employe')}}">
                <i class="bi bi-circle"></i><span>   جدول الموظفين</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Icons Nav -->

        <li class="nav-item">
        <a class="nav-link " href="{{route('admin.analytic')}}">
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
  <main id="main" class="main">
  <div class="pagetitle" dir="rtl">
      <h1>البيانات التحليلية</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a></li>
          <li class="breadcrumb-item active">الرسومات البيانية</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- request (order) Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    <h6>تصفية</h6>
                    </li>

                   
                    <li><a class="dropdown-item" href="#">اليوم</a></li>
                    <li><a class="dropdown-item" href="#">هذا الشهر</a></li>
                    <li><a class="dropdown-item" href="#">هذه السنة</a></li>

                  </ul>
                </div>

                <div class="card-body">
                <h5 class="card-title"> الطلبات   <span>    | هذه السنة</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-translate"></i>
                    </div>
                    <div class="ps-3">
                   
                      <h6></h6>
                   

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- employe Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    <h6>تصفية</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">اليوم</a></li>
                    <li><a class="dropdown-item" href="#">هذا الشهر</a></li>
                    <li><a class="dropdown-item" href="#">هذه السنة</a></li>
                  </ul>
                </div>

                <div class="card-body">
                <h5 class="card-title"> الموظفين   <span>    | هذه السنة</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-rolodex"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$employe_number}}</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- users Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>تصفية</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">اليوم</a></li>
                    <li><a class="dropdown-item" href="#">هذا الشهر</a></li>
                    <li><a class="dropdown-item" href="#">هذه السنة</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title"> المستخدمين   <span>    | هذه السنة</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                  
                    <div class="ps-3">
                      <h6>{{$user_number}}</h6>
                      
                    </div>
                  
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    <h6>تصفية</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">اليوم</a></li>
                    <li><a class="dropdown-item" href="#">هذا الشهر</a></li>
                    <li><a class="dropdown-item" href="#">هذه السنة</a></li>
                  </ul>
                </div>

                <div class="card-body">
                <h5 class="card-title"> التقارير   <span>    | هذه السنة</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'الطلبات',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'الموظفين',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'المستخدمين',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td>$64</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td>$147</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Raheem Lehner</td>
                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                        <td>$165</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

       
        

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

          

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assetss/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assetss/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assetss/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assetss/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assetss/js/main.js')}}"></script>

</body>

</html>
