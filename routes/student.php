<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
// Auth::guard('student');
// Route::middleware('auth:student')->group(function() {
//     Route::get('', 'DashBoardController@index')->name('dashboard');
// });

Route::get('/login', 'Auth\LoginController@index')->name('login'); // formulário de login
Route::post('/login', 'Auth\LoginController@login')->name('login.submit'); // login
Route::get('/logout', 'Auth\LoginController@logout')->name('logout'); // logout
Route::get('/forgot-password', 'Auth\ForgotPasswordController@index')->name('forgotPassword'); // formulário de esqueceu a senha
Route::post('/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('forgotPassword.submit'); // envia um email com o token de verificação
Route::get('/reset-password', 'Auth\ResetPasswordController@index')->name('resetPassword'); // formulário de esqueceu a senha
Route::post('/reset-password', 'Auth\ResetPasswordController@reset')->name('resetPassword.submit'); // envia um email com o token de verificação
Route::get('/verify', 'Auth\VerificationController@index')->name('verify'); // formulário de novo estudante
Route::get('/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verify.submit'); // formulário de novo estudante
Route::post('/verify', 'Auth\VerificationController@resend')->name('verify.resend'); // formulário de novo estudante
Route::get('/confirm', 'Auth\ConfirmPasswordController@index')->name('confirm'); // formulário de novo colaborador
Route::post('/confirm', 'Auth\ConfirmPasswordController@confirm')->name('confirm.submit'); // formulário de novo colaborador
Route::get('/register', 'Auth\RegisterController@index')->name('register'); // formulário de novo estudante
Route::post('/register', 'Auth\RegisterController@store')->name('register.submit'); // adicioanr novo student
// interno
Route::get('/', 'DashBoardController@index')->name('dashboard'); // verifica se já está registrado no exam
Route::post('/register-exam', 'App\Http\Controllers\Auth\StudentController@registerExam')->name('dashboard.student.register.exam'); // registrar para o exam
Route::get('/redefine-password', 'App\Http\Controllers\Auth\StudentController@formRedefinePassword')->name('dashboard.student.redefine.password'); // formulário de redefinir senha
Route::post('/redefine-password', 'App\Http\Controllers\Auth\StudentController@submitRedefinePassword')->name('dashboard.student.redefine.password.submit'); // salvar uma nova senha
Route::get('/personal-information', 'App\Http\Controllers\StudentPersonalInfoController@index')->name('dashboard.student.personal.info');
Route::post('/personal-information', 'App\Http\Controllers\StudentPersonalInfoController@store')->name('dashboard.student.personal.info.save');
Route::put('/personal-information', 'App\Http\Controllers\StudentPersonalInfoController@update')->name('dashboard.student.personal.info.update');
Route::get('/add-institution', 'App\Http\Controllers\StudentAddInstitutionController@index')->name('dashboard.student.add.institution');
Route::post('/add-institution', 'App\Http\Controllers\StudentAddInstitutionController@store')->name('dashboard.student.add.institution.save');
Route::put('/add-institution', 'App\Http\Controllers\StudentAddInstitutionController@edit')->name('dashboard.student.add.institution.update');
Route::get('/add-area', 'App\Http\Controllers\StudentAddAreaController@index')->name('dashboard.student.add.area');
Route::post('/add-area', 'App\Http\Controllers\StudentAddAreaController@store')->name('dashboard.student.add.area.save');
Route::put('/add-area', 'App\Http\Controllers\StudentAddAreaController@edit')->name('dashboard.student.add.area.update');
Route::get('/add-document', 'App\Http\Controllers\StudentAddDocumentController@index')->name('dashboard.student.add.document');
Route::post('/add-document', 'App\Http\Controllers\StudentAddDocumentController@store')->name('dashboard.student.add.document.save');
Route::put('/add-document', 'App\Http\Controllers\StudentAddDocumentController@edit')->name('dashboard.student.add.document.update');
Route::get('/recommendation-letter', 'App\Http\Controllers\StudentRecommendationLetterController@index')->name('dashboard.student.recommentation.letter');
Route::get('/schedule-interview', 'App\Http\Controllers\StudentScheduleInterviewController@index')->name('dashboard.student.schedule.interview');
Route::post('/schedule-interview', 'App\Http\Controllers\StudentScheduleInterviewController@store')->name('dashboard.student.schedule.interview.save');
Route::put('/schedule-interview', 'App\Http\Controllers\StudentScheduleInterviewController@edit')->name('dashboard.student.schedule.interview.update');
