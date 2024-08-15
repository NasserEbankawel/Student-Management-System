<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Bouncer;
use App\Http\Middleware\NameChecker;
use App\Http\Middleware\SuperAdminGuard;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\Student;
use Illuminate\Http\Request;

/* use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMessage;



Route::get('/mail',function(){
    Mail::to('test@test.com')->send(new WelcomeMessage());
}); */

Route::redirect('/','/login');

Route::get('/login',[AuthController::class, 'getLoginPage'])->name('auth.loginPage')->middleware('guest');
Route::get('/forgot-password',[AuthController::class, 'getForgotPasswordPage'])->name('auth.getForgotPasswordPage')->middleware('guest');
Route::post('/forgot-password',[AuthController::class, 'requestForgotPasswordLink'])->name('auth.requestForgotPasswordLink')->middleware('guest');

Route::get('/reset-password/{token}',[AuthController::class, 'getPasswordResetPage'])->name('password.reset')->middleware('guest');
Route::post('/reset-password',[AuthController::class, 'resetPassword'])->name('auth.resetPassword')->middleware('guest');

Route::post('/login',[AuthController::class, 'authenticate'])->name('auth.login')->middleware('guest');
Route::post('/logout',[AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

Route::resource('students', StudentController::class)->middleware('auth');
Route::resource('courses', CourseController::class)->middleware('auth');
Route::resource('subjects', SubjectController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware(['auth', SuperAdminGuard::class]);

Route::get('/homepage', function(Request $request){
    $name = $request->query('name');
    $age = $request->query('age');
    $number = $request->query('number');
    return view('homepage', [
        'name' => $name,
        'age' => $age,
        'number' => $number
    ]);
})->name('students.homepage') ;
/* Route::redirect('/', '/login') ;

Route::get('/login', [AuthController::class, 'getLoginPage'])->name('auth.loginPage');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('subjects', SubjectController::class); */

/* Route::get('/students', [StudentController::class, 'index'])->name('students.index') ; 
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create') ; 
Route::post('/students', [StudentController::class, 'store'])->name('students.store') ; 
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit') ; 
Route::patch('/students/{student}', [StudentController::class, 'update'])->name('students.update') ; 
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show') ; 
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy') ;  */






//courses route

/* Route::get('/courses', [CourseController::class, 'index'])->name('courses.index') ; 
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create') ; 
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store') ; 
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::patch('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show') ;  
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy') ; 
 */



//subjects route

/* Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index') ; 
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create') ; 
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store') ; 
Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit') ; 
Route::patch('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update') ; 
Route::get('/subjects/{id}', [SubjectController::class, 'show'])->name('subjects.show') ; 
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy') ;  */









// Define route for editing a student
//Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Define route for updating a student
//Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');



/* Route::get('/homepage', function(){
    return view('homepage', [
        'name' => 'Nasser'
    ]);
}); */



























/* Route::get('/hi', [StudentController::class, 'hi']) ; 

Route::get('/students', [StudentController::class, 'studentName']) ; 
 */


/* 
Route::get('/Hi', function () {
    return "Welcome back" ;
})->middleware([NameChecker::class]);



Route::get('/students', function () {
    return "<h1>Student Name: Kofi</h1><h1>Student Name: Ama</h1>" ;
})->middleware([Bouncer::class]);





 */



/* Route::get('/Students/{id}', function (string $id) {
    return "<h1>Student Name: Kofi, Id: {$id}</h1>" ;
});

 
Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    return "Your postID is {$postId} and your comment is {$commentId}" ;
});

Route::get('/students/{Name}/{id}', function ($id, $name) {
    return "<h1>Id: {$id} : Student Name: {$name}</h1>" ;
});

Route::get('/checkname', function (Request $request) {
    return response('Welcome, your name starts with A');
})->middleware([NameChecker::class]);
 */

