<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', [App\Http\Controllers\Auth\StudentLoginController::class, 'index'])->name('login.student'); // formulário de login
Route::post('/login', [App\Http\Controllers\Auth\StudentLoginController::class, 'login'])->name('login.student.submit'); // login
Route::get('/logout', [App\Http\Controllers\Auth\StudentLoginController::class, 'logout'])->name('logout.student'); // logout
Route::get('/forgot-password', [App\Http\Controllers\Auth\StudentForgotPasswordController::class, 'index'])->name('forgotPassword.student'); // formulário de esqueceu a senha
Route::post('/forgot-password', [App\Http\Controllers\Auth\StudentForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgotPassword.student.submit'); // envia um email com o token de verificação
Route::get('/reset-password', [App\Http\Controllers\Auth\StudentResetPasswordController::class, 'index'])->name('resetPassword.student'); // formulário de esqueceu a senha
Route::post('/reset-password', [App\Http\Controllers\Auth\StudentResetPasswordController::class, 'reset'])->name('resetPassword.student.submit'); // envia um email com o token de verificação
Route::get('/verify', [App\Http\Controllers\Auth\StudentVerificationController::class, 'index'])->name('verification.student'); // formulário de novo estudante
Route::get('/verify/{id}/{hash}', [App\Http\Controllers\Auth\StudentVerificationController::class, 'verify'])->name('verification.student.verify'); // formulário de novo estudante
Route::post('/verify', [App\Http\Controllers\Auth\StudentVerificationController::class, 'resend'])->name('verification.student.resend'); // formulário de novo estudante
Route::get('/confirm', [App\Http\Controllers\Auth\StudentConfirmPasswordController::class, 'index'])->name('confirm.student'); // formulário de novo colaborador
Route::post('/confirm', [App\Http\Controllers\Auth\StudentConfirmPasswordController::class, 'confirm'])->name('confirm.student'); // formulário de novo colaborador
Route::get('/register', [App\Http\Controllers\Auth\StudentRegisterController::class, 'index'])->name('register.student'); // formulário de novo estudante
Route::post('/register', [App\Http\Controllers\Auth\StudentRegisterController::class, 'store'])->name('register.student.submit'); // adicioanr novo student
// interno
Route::get('/', [App\Http\Controllers\Auth\StudentController::class, 'index'])->name('dashboard.student'); // verifica se já está registrado no exam
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
