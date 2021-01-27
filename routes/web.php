<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});
Route::get('/general-info', function () {
    return view('general-info');
});
Route::get('/recommendation-letter', function () {
    return view('recommendation-letter');
});
Route::get('/credits', function () {
    return view('credits');
});

Route::prefix('student')->group(function() {
    // esterno
    Route::get('/login', 'Auth\StudentLoginController@formLogin')->name('login.student'); // formulário de login
    Route::post('/login', 'Auth\StudentLoginController@submitLogin')->name('login.student.submit'); // login
    Route::get('/logout', 'Auth\StudentLoginController@logout')->name('logout.student'); // logout
    Route::get('/forgot-password', 'Auth\StudentLoginController@formForgotPassword')->name('forgotPassword.student'); // formulário de esqueceu a senha
    Route::post('/forgot-password', 'Auth\StudentLoginController@submitForgotPassword')->name('forgotPassword.student.submit'); // envia um email com o token de verificação
    Route::get('/register', 'Auth\StudentLoginController@formRegister')->name('register.student'); // formulário de novo estudante
    Route::post('/register', 'Auth\StudentLoginController@submitRegister')->name('register.student.submit'); // adicioanr novo student
    // interno
    Route::get('/', 'Auth\StudentController@index')->name('dashboard.student'); // verifica se já está registrado no exam
    Route::post('/register-exam', 'Auth\StudentController@registerExam')->name('dashboard.student.register.exam'); // registrar para o exam
    Route::get('/redefine-password', 'Auth\StudentController@formRedefinePassword')->name('dashboard.student.redefine.password'); // formulário de redefinir senha
    Route::post('/redefine-password', 'Auth\StudentController@submitRedefinePassword')->name('dashboard.student.redefine.password.submit'); // salvar uma nova senha
    Route::get('/personal-information', 'Auth\StudentController@formPersonalInfo')->name('dashboard.student.personal.info');
    Route::post('/personal-information', 'Auth\StudentController@personalInfoSave')->name('dashboard.student.personal.info.save');
    Route::put('/personal-information', 'Auth\StudentController@personalInfoUpdate')->name('dashboard.student.personal.info.update');
    Route::get('/add-institution', 'Auth\StudentController@formAddInstituition')->name('dashboard.student.add.institution');
    Route::post('/add-institution', 'Auth\StudentController@addInstituitionSave')->name('dashboard.student.add.institution.save');
    Route::put('/add-institution', 'Auth\StudentController@addInstituitionUpdate')->name('dashboard.student.add.institution.update');
    Route::get('/add-area', 'Auth\StudentController@formAddArea')->name('dashboard.student.add.area');
    Route::post('/add-area', 'Auth\StudentController@addAreaSave')->name('dashboard.student.add.area.save');
    Route::update('/add-area', 'Auth\StudentController@addAreaUpdate')->name('dashboard.student.add.area.update');
    Route::get('/add-document', 'Auth\StudentController@formAddDocument')->name('dashboard.student.add.document');
    Route::post('/add-document', 'Auth\StudentController@addDocumentSave')->name('dashboard.student.add.document.save');
    Route::update('/add-document', 'Auth\StudentController@addDocumentUpdate')->name('dashboard.student.add.document.update');
    Route::get('/recommendation-letter', 'Auth\StudentController@formRecommendationLetter')->name('dashboard.student.recommentation.letter');
    Route::get('/schedule-interview', 'Auth\StudentController@formScheduleInterview')->name('dashboard.student.schedule.interview');
    Route::post('/schedule-interview', 'Auth\StudentController@scheduleInterviewSave')->name('dashboard.student.schedule.interview.save');
    Route::put('/schedule-interview', 'Auth\StudentController@scheduleInterviewUpdate')->name('dashboard.student.schedule.interview.update');
});

Route::prefix('collaborator')->group(function() {
    // externo
    Route::get('/login', 'Auth\CollaboratorLoginController@index')->name('login.collaborator');
    Route::post('/login', 'Auth\CollaboratorLoginController@login')->name('login.collaborator.save');
    Route::get('/logout', 'Auth\CollaboratorLoginController@logout')->name('logout.collaborator');
    Route::get('/forgot-password', 'Auth\CollaboratorLoginController@formForgotPassword')->name('forgotPassword.collaborator'); // formulário de esqueceu a senha
    Route::post('/forgot-password', 'Auth\CollaboratorLoginController@submitForgotPassword')->name('forgotPassword.collaborator.submit'); // envia um email com o token de verificação
    Route::get('/register', 'Auth\CollaboratorLoginController@formRegister')->name('register.collaborator'); // formulário de novo colaborador
    Route::post('/register', 'Auth\CollaboratorLoginController@submitRegister')->name('register.collaborator.submit'); // adicioanr novo colaborador
    // interno
    Route::get('/', 'Auth\CollaboratorController@index')->name('dashboard.collaborator');
    Route::get('/redefine-password', 'Auth\CollaboratorController@redefine_password')->name('dashboard.collaborator.redefine.password');
    Route::get('/redefine-password', 'Auth\CollaboratorController@formRedefinePassword')->name('dashboard.collaborator.redefine.password'); // formulário de redefinir senha
    Route::post('/redefine-password', 'Auth\CollaboratorController@submitRedefinePassword')->name('dashboard.collaborator.redefine.password.submit'); // salvar uma nova senha
    Route::get('/personal-information', 'Auth\CollaboratorController@formPersonalInfo')->name('dashboard.collaborator.personal.info');
    Route::post('/personal-information', 'Auth\CollaboratorController@personalInfoSave')->name('dashboard.collaborator.personal.info.save');
    Route::put('/personal-information', 'Auth\CollaboratorController@personalInfoUpdate')->name('dashboard.collaborator.personal.info.update');
    
    Route::get('/collaborators', 'Auth\CollaboratorController@listCollaborators')->name('dashboard.collaborator.list');

    Route::get('/{:id}/personal-information', 'Auth\CollaboratorController@formCollaboratorPersonalInfo')->name('dashboard.collaborator.collaborator.personal.info');
    Route::put('/{:id}/personal-information', 'Auth\CollaboratorController@collaboratorPersonalInfoUpdate')->name('dashboard.collaborator.collaborator.personal.info.update');
    Route::put('/{:id}/nivel', 'Auth\CollaboratorController@collaboratorNivelUpdate')->name('dashboard.collaborator.collaborator.nivel.update');
    Route::delete('/{:id}', 'Auth\CollaboratorController@collaboratorsDelete')->name('dashboard.collaborator.collaborator.delete');
    Route::get('/recommendation-letter', 'Auth\CollaboratorController@formRecommendationLetter')->name('dashboard.collaborator.recommandation.letter');
    Route::post('/recommendation-letter', 'Auth\CollaboratorController@recommendationLetterSave')->name('dashboard.collaborator.recommandation.letter.save');
    
    Route::get('/students', 'Auth\CollaboratorController@listStudents')->name('dashboard.collaborator.students');
    
    Route::prefix('student')->group(function () {
        Route::get('/{:id}/personal-information', 'Auth\CollaboratorController@formStudentPersonalInformation')->name('dashboard.collaborator.student.personal-info');
        Route::put('/{:id}/personal-information', 'Auth\CollaboratorController@studentPersonalInformationUpdate')->name('dashboard.collaborator.student.personal.info.update');
        Route::get('/{:id}/institution', 'Auth\CollaboratorController@formStudentInstituition')->name('dashboard.collaborator.students.institution');
        Route::put('/{:id}/institution', 'Auth\CollaboratorController@studentInstituitionUpdate')->name('dashboard.collaborator.students.institution.update');
        Route::get('/{:id}/area', 'Auth\CollaboratorController@formStudentArea')->name('dashboard.collaborator.students.area');
        Route::update('/{:id}/area', 'Auth\CollaboratorController@studentAreaUpdate')->name('dashboard.collaborator.students.area.update');
        Route::get('/{:id}/document', 'Auth\CollaboratorController@formStudentDocument')->name('dashboard.collaborator.student.document');
        Route::put('/{:id}/document', 'Auth\CollaboratorController@studentDocumentUpdate')->name('dashboard.collaborator.student.document.update');
        Route::get('/{:id}/recommnedation-letter', 'Auth\CollaboratorController@formStudentRecommendationLetter')->name('dashboard.collaborator.student.document');
        Route::put('/{:id}/recommendation-letter', 'Auth\CollaboratorController@studentRecommendationLetterUpdate')->name('dashboard.collaborator.student.document.update'); 
        Route::delete('/{:id}', 'Auth\CollaboratorController@studentDelete')->name('dashboard.collaborator.student');
    });
    
});