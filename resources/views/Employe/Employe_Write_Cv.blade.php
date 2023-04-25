@extends("Employe/Employe_Dashboard")
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>الصفحة الرئيسية - SPU Translate</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
 

          <main id="main" class="main"  dir="rtl">

    <div class="pagetitle">
      <h1>طلبات كتابة السيرة الذاتية </h1>

    </div><!-- End Page Title -->

    <section class="section" >
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">جدول الطلبات   </h5>

              <!-- Table with stripped rows -->
              <table class="table datatable  table-hover" style="overflow:scroll ;">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم الكامل</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">اللغة</th>
                    <th scope="col">المعلومات الشخصية</th>
                    <th scope="col">الاكاديمية</th>
                    <th scope="col">الخبرة الوظيفية</th>
                    <th scope="col">الدورات</th>
                    <th scope="col">المهارات</th>
                    <th scope="col">الهوايات</th>
                    <th scope="col">التذكيات</th>
                    <th scope="col">رابط الملف</th>
                    <th scope="col"> تاريخ رفع الطلب</th>
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($write_cv as $result)
                  <tr>
                    <th scope="row">{{$result->id}}</th>
                    <td>{{$result->user->name}}</td>
                    <td>{{$result->user->email}}</td>
                    <td>{{$result->name}}</td>  
                    <td>{{$result->language}}</td>   
                    <td>{{$result->details}}</td> 
                    <td>{{$result->Acadimic}}</td> 
                    <td>{{$result->Jop}}</td>
                    <td>{{$result->Courses}}</td>
                    <td>{{$result->Skils}}</td>
                    <td>{{$result->hobbies}}</td>
                    <td>{{$result->zakst}}</td>
                    <td>{{$result->path}}</td>
                    <td>{{$result->created_at}}</td>
                    <td><a href=""><i class="bi bi-download"></i></a></td>
                    <td><a href=""><i class="bi bi-eye"></i></a></td>
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
