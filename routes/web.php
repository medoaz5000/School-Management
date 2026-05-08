<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSujectController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('forget-password', [AuthController::class, 'forgetpassword']);
Route::post('forget-password', [AuthController::class, 'forgetpass']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'Authregister']);






Route::group(['middleware' => 'admin'], function(){

   Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
   Route::get('admin/admin/list', [AdminController::class, 'list']);
   Route::get('admin/admin/add', [AdminController::class, 'add']);
   Route::post('admin/admin/add', [AdminController::class, 'insert'])->name('admin.add.post');
   Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
   Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
   Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);


   //Students
   Route::get('admin/student/list', [StudentController::class, 'list']);
   Route::get('admin/student/add', [StudentController::class, 'add']);
   Route::post('admin/student/add', [StudentController::class, 'insert'])->name('student.add.post');
   Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
   Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
   Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);


   //Parents
   Route::get('admin/parent/list', [ParentController::class, 'list']);
   Route::get('admin/parent/add', [ParentController::class, 'add']);
   Route::post('admin/parent/add', [ParentController::class, 'insert'])->name('parent.add.post');
   Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']);
   Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
   Route::get('admin/parent/delete/{id}', [ParentController::class, 'delete']);
   Route::get('admin/parent/my-student/{id}', [ParentController::class, 'myStudent']);
   Route::get('admin/parent/assign_student/{id}/{parent_id}', [ParentController::class, 'assign_student']);
   Route::post('admin/parent/assign_student', [ParentController::class, 'insert_student'])->name('');


   //Teachers
   Route::get('admin/teacher/list', [TeacherController::class, 'list']);
   Route::get('admin/teacher/add', [TeacherController::class, 'add']);
   Route::post('admin/teacher/add', [TeacherController::class, 'insert'])->name('teacher.add.post');
   Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
   Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
   Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'delete']);


   // Class url
   Route::get('admin/class/list', [ClassController::class, 'list']);
   Route::get('admin/class/add', [ClassController::class, 'add']);
   Route::post('admin/class/add', [ClassController::class, 'insert'])->name('class.add.post');
   Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
   Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
   Route::get('admin/class/delete/{id}', [ClassController::class, 'delete']);


   // Subject url
   Route::get('admin/subject/list', [SubjectController::class, 'list']);
   Route::get('admin/subject/add', [SubjectController::class, 'add']);
   Route::post('admin/subject/add', [SubjectController::class, 'insert'])->name('subject.add.post');
   Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
   Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
   Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']);



   // Assign Subject url
   Route::get('admin/assign_subject/list', [ClassSujectController::class, 'list']);
   Route::get('admin/assign_subject/add', [ClassSujectController::class, 'add']);
   Route::post('admin/assign_subject/add', [ClassSujectController::class, 'insert'])->name('assign_subject.add.post');
   Route::get('admin/assign_subject/edit/{id}', [ClassSujectController::class, 'edit']);
   Route::post('admin/assign_subject/edit/{id}', [ClassSujectController::class, 'update']);
   Route::get('admin/assign_subject/delete/{id}', [ClassSujectController::class, 'delete']);
   Route::get('admin/assign_subject/edit_single/{id}', [ClassSujectController::class, 'edit_single']);
   Route::post('admin/assign_subject/edit_single/{id}', [ClassSujectController::class, 'update_single']);



   //Change Password
   Route::get('admin/change_password', [UserController::class, 'change_password']);
   Route::post('admin/change_password', [UserController::class, 'update_change_password']);



});


Route::group(['middleware' => 'teacher'], function(){

    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);

        //Change Password
    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
});


Route::group(['middleware' => 'student'], function(){

    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);

        //Change Password
    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);
});


Route::group(['middleware' => 'parent'], function(){
    
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);

        //Change Password
    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);
});
