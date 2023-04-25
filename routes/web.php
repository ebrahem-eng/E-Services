<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Articles_WritingController;
use App\Http\Controllers\Ask_UsController;
use App\Http\Controllers\Check_UserController;
use App\Http\Controllers\ComplaintsController;
use App\Http\Controllers\Content_WritingController;
use App\Http\Controllers\Editing_CheckController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PowerPointController;
use App\Http\Controllers\Research_WritingController;
use App\Http\Controllers\TranslateController;
use App\Http\Controllers\Write_CvController;
use App\Http\Livewire\Admin\Employe\ShowEmploye;
use App\Models\Admin;
use App\Models\Write_Artical;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[Check_UserController::class , 'CheckUserType']);


Route::get('welcome', function () {
    return view('welcome');
})->name('welcome');


//Route::get('livewire/admin/employe/show-employe',ShowEmploye::class)->name("show.employe");

//complaints  الشكاوي 

Route::post('Store_Complaints',[ComplaintsController::class , 'Store_Complaints'])->name('Store.Complaints');



//Admin

//<==============Admin section==========>

//dashboard
Route::get('Admin/dashboard',function(){
    return view('Admin/Admin_dashboard');
})->middleware(['auth','verified'])->name("admin.dashboard");





//Analytic
Route::get('Admin/Analytical_Data',[AdminController::class , 'Show_Analytical_Data'])->middleware(['auth','verified']
)->name("admin.analytic");




//Add_employe
Route::get('Admin/Add_Employe',function(){
    return view('Admin/Add_Employe');
})->middleware(['auth','verified'])->name("admin.addemploye");

Route::post('Admin/Add_Employe/Store',[AdminController::class,'Store_Add_Employe']
)->middleware(['auth','verified'])->name("store_Add_Employe");






//Archives_Employe
Route::get('Admin/Employe_Archives',[AdminController::class , 'Get_Employe_Archives'])->middleware(['auth','verified'])->name("admin.archives_employe");
Route::get('Admin/Employe_Archives/Restore/{id}',[AdminController::class , 'Restore_Employe_Archives'])->middleware(['auth','verified'])->name("Restore_Employe_Archives");
Route::get('Admin/Employe_Archives/Force/{id}',[AdminController::class , 'Force_Employe_Archives'])->middleware(['auth','verified'])->name("Force_Employe_Archives");





//Show_Employe
Route::get('Admin/Show_Employe',[AdminController::class,"Show_Employe"])->middleware(['auth','verified'])->name('admin.show_employe');


//Deleting_Employe
Route::delete('Admin/Show_Employe/Delete/{id}',[AdminController::class,"Delete_Employe"])->name("delete_employe");


//GivePower_Employe
Route::get('Admin/Employe_GivePowers',[AdminController::class , 'Employe_GivePowers'])->middleware(['auth','verified'])->name('admin.give_employe');





//Edite_Employe
Route::get('Admin/Edite_Employe/{id}',[AdminController::class,'Edite_Employe'])->middleware(['auth','verified'])->name('admin.edite_employe');

Route::put('Admin/Update_Employe/{id}',[AdminController::class , 'Update_Employe'])->middleware(['auth','verified'])->name("Update_Employe");






/*

Route::middleware('admin:admin')->group(function(){
Route::get('admin/login',[AdminController::class , 'LoginForm']);
Route::post('admin/login',[AdminController::class , 'store'])->name('admin.login');
});
Route::middleware(['auth:sanctum,admin', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('Admin/Admin_dashboard');
    })->name('dashboard')->middleware('auth:admin');

});
*/


//<============== End Admin section==========>




//Employe
//<==============Employe section==========>

Route::get('Employe/Employe_Dashboard',[EmployeController::class, 'Employe_Dashboard'])->middleware(['auth','verified'])->name("employe.dashboard");


Route::get('Employe/Employe_Translate_graduation',[EmployeController::class , 'Employe_Translate_graduation'])->middleware(['auth','verified'])->name('employe.translate.graduation');


Route::get('Employe/Employe_Translate_Cv',[EmployeController::class , 'Employe_Translate_Cv'])->middleware(['auth','verified'])->name('employe.translate.cv');


Route::get('Employe/Employe_Write_Content',[EmployeController::class , 'Employe_Write_Content'])->middleware(['auth','verified'])->name("Employe.Write.Content");


Route::get('Employe/Employe_Write_Article',[EmployeController::class ,'Employe_Write_Article'])->middleware(['auth','verified'])->name('Employe.Write.Article');


Route::get('Employe/Employe_Write_Research',[EmployeController::class , 'Employe_Write_Research'])->middleware(['auth','verified'])->name('Employe.Write.Research');


Route::get('Employe/Employe_Edit_Check',[EmployeController::class,'Employe_Edit_Check'])->middleware(['auth','verified'])->name("Employe.Edit.Check");


Route::get('Employe/Employe_Ask_Us',[EmployeController::class , 'Employe_Ask_Us'])->middleware(['auth','verified'])->name("Employe.Ask.Us");


Route::get('Employe/Employe_Write_Cv',[EmployeController::class,'Employe_Write_Cv'])->middleware(['auth','verified'])->name("Employe.Write.Cv");


Route::get('Employe/Employe_Power_Point',[EmployeController::class , 'Employe_Power_Point'])->middleware(['auth','verified'])->name('Employe.Power.Point');


Route::get('Employe/Employe_Complaints',[ComplaintsController::class , 'Employe_Complaints'])->middleware(['auth','verified'])->name('Employe.Complaints');





/*
Route::middleware('employe:employe')->group(function(){
    Route::get('employe/login',[EmployeController::class , 'LoginForm']);
    Route::post('employe/login',[EmployeController::class , 'store'])->name('employe.login');
    });
Route::middleware(['auth:sanctum,employe', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('employe/dashboard', function () {
        return view('Employe/Employe_Translate');
    })->name('dashboard')->middleware('auth:employe');

});
*/

//<==============End Employe section==========>


//<==============User section==========>

//User
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//User-Translate
Route::controller(TranslateController::class)->group(function(){
   Route::get('Student/Translate/Final_project','Show_Final_Project')->name('Final-project');
   Route::post('Student/Translate/Final_project/Store','Store_Final_Project')->name("store-project");



   Route::get('Student/Translate/Cv_translate','Show_Cv_translate')->name("Cv_translate");
   Route::post('Student/Translate/Cv_translate/Store','Store_Cv_translate')->name("store-cv-translate");
})->middleware(['auth','verified']);





//User-Content_Writing
Route::controller(Content_WritingController::class)->group(function(){
Route::get('Student/Content_Writing/Market_content','Show_Market_content')->name('Market_content');
Route::post('Student/Content_Writing/Market_content/Store','Store_Market_content')->name('store_Market_content');
})->middleware(['auth','verified']);





//User-Artical_Writing
Route::controller(Articles_WritingController::class)->group(function(){
Route::get('Student/Articles_Write/Academic_Articles','Show_Academic_Articles')->name("Academic_Articles");
Route::post('Student/Articles_Write/Academic_Articles/Store','Store_Academic_Articles')->name("store_Academic_Articles");



Route::get('Student/Articles_Write/Literary_Articles','Show_Literary_Articles')->name("Literary_Articles");
Route::post('Student/Articles_Write/Literary_Articles/Show','Store_Literary_Articles')->name("store_Literary_Articles");



Route::get('Student/Articles_Write/Technique_Articles','Show_Technique_Articles')->name("Technique_Articles");
Route::post('Student/Articles_Write/Technique_Articles/Store','Store_Technique_Articles')->name("store_Technique_Articles");



Route::get('Student/Articles_Write/Marketing_Articles','Show_Marketing_Articles')->name("Marketing_Articles");
Route::post('Student/Articles_Write/Marketing_Articles/Store','Store_Marketing_Articles')->name("store_Marketing_Articles");

})->middleware(['auth','verified']);




//User-Research_Writing
Route::controller(Research_WritingController::class)->group(function(){
    Route::get('Student/Research_Write/Research_Academic','Show_Research_Academic')->name("Research_Academic");
    Route::post('Student/Research_Write/Research_Academic/Store','Store_Research_Academic')->name("store_Research_Academic");



    Route::get('Student/Research_Write/Research_Scientific','Show_Research_Scientific')->name("Research_Scientific");
    Route::post('Student/Research_Write/Research_Scientific/Store','Store_Research_Scientific')->name("store_Research_Scientific");



    Route::get('Student/Research_Write/Research_Economic','Show_Research_Economic')->name("Research_Economic");
    Route::post('Student/Research_Write/Research_Economic/Store','Store_Research_Economic')->name("store_Research_Economic");



    Route::get('Student/Research_Write/Research_Legal','Show_Research_Legal')->name("Research_Legal");
    Route::post('Student/Research_Write/Research_Legal/Store','Store_Research_Legal')->name("store_Research_Legal");



    Route::get('Student/Research_Write/Research_Seminars','Show_Research_Seminars')->name("Research_Seminars");
    Route::post('Student/Research_Write/Research_Seminars/Store','Store_Research_Seminars')->name("store_Research_Seminars");

})->middleware(['auth','verified']);




//User-Editing_Check
Route::controller(Editing_CheckController::class)->group(function(){
    Route::get('Student/Editing_Check/Editing_Check_Text','Show_Editing_Check_Text')->name("Editing_Check_Text");
    Route::post('Student/Editing_Check/Editing_Check_Text/Store','Store_Editing_Check_Text')->name("store_Check_Text");



    Route::get('Student/Editing_Check/Editi_Check_Articles','Show_Editi_Check_Articles')->name("Editi_Check_Articles");
    Route::post('Student/Editing_Check/Editi_Check_Articles/Store','Store_Editi_Check_Articles')->name("store_Editi_Check_Articles");



    Route::get('Student/Editing_Check/Editing_Check_Graduation','Show_Editing_Check_Graduation')->name("Editing_Check_Graduation");
    Route::post('Student/Editing_Check/Editing_Check_Graduation/Store','Store_Editing_Check_Graduation')->name("store_Editing_Check_Graduation");



    Route::get('Student/Editing_Check/Editing_Check_Research','Show_Editing_Check_Research')->name("Editing_Check_Research");
    Route::post('Student/Editing_Check/Editing_Check_Research/Store','Store_Editing_Check_Research')->name("store_Editing_Check_Research");

})->middleware(['auth','verified']);




//User-Ask_Us
Route::controller(Ask_UsController::class)->group(function(){
    Route::get("Student/Ask_Us/Ask_Us","Show_Ask_Us")->name("Ask_Us");
    Route::post('Student/Ask_Us/Ask_Us/Store','Store_Ask_Us')->name("store_Ask_Us");
})->middleware(['auth','verified']);



//User-Write_Cv
Route::controller(Write_CvController::class)->group(function(){
    Route::get('Student/Write_Cv/Write_Cv','Show_Write_Cv')->name("Write_Cv");
    Route::post('Student/Write_Cv/Write_Cv/Store','Store_Write_Cv')->name("store_Write_Cv");

})->middleware(['auth','verified']);




//User-PowerPoint
Route::controller(PowerPointController::class)->group(function(){
    Route::get('Student/PowerPoint/PowerPoint','Show_PowerPoint')->name("PowerPoint");
    Route::post('Student/PowerPoint/PowerPoint/Store','Store_PowerPoint')->name("store_PowerPoint");
   
})->middleware(['auth','verified']);


//<==============End User section==========>
