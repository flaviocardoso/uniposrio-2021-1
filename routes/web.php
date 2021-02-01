<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/credits', [App\Http\Controllers\CreditsController::class, 'index']);

Route::prefix('student')->group(function() {
    // esterno
    Route::get('/login', [App\Http\Controllers\Auth\StudentLoginController::class, 'index'])->name('login.student'); // formulário de login
    Route::post('/login', [App\Http\Controllers\Auth\StudentLoginController::class, 'login'])->name('login.student.submit'); // login
    Route::get('/logout', [App\Http\Controllers\Auth\StudentLoginController::class, 'logout'])->name('logout.student'); // logout
    Route::get('/forgot-password', [App\Http\Controllers\Auth\StudentForgotPasswordController::class, 'index'])->name('forgotPassword.student'); // formulário de esqueceu a senha
    Route::post('/forgot-password', [App\Http\Controllers\Auth\StudentForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgotPassword.student.submit'); // envia um email com o token de verificação
    Route::get('/reset-password', [App\Http\Controllers\Auth\StudentResetPasswordController::class, 'index'])->name('resetPassword.student'); // formulário de esqueceu a senha
    Route::post('/reset-password', [App\Http\Controllers\Auth\StudentResetPasswordController::class, 'reset'])->name('resetPassword.student.submit'); // envia um email com o token de verificação
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
});

Route::prefix('collaborator')->group(function() {
    // externo
    Route::get('/login', [App\Http\Controllers\Auth\CollaboratorLoginController::class, 'index'])->name('login.collaborator');
    Route::post('/login', [App\Http\Controllers\Auth\CollaboratorLoginController::class, 'login'])->name('login.collaborator.submit');
    Route::get('/logout', [App\Http\Controllers\Auth\CollaboratorLoginController::class, 'logout'])->name('logout.collaborator');
    Route::get('/forgot-password', [App\Http\Controllers\Auth\CollaboratorForgotPasswordController::class, 'index'])->name('forgotPassword.collaborator'); // formulário de esqueceu a senha
    Route::post('/forgot-password', [App\Http\Controllers\Auth\CollaboratorForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgotPassword.collaborator.submit'); // envia um email com o token de verificação
    Route::get('/reset-password', [App\Http\Controllers\Auth\CollaboratorResetPasswordController::class, 'index'])->name('resetPassword.collaborator'); // formulário de esqueceu a senha
    Route::post('/reset-password', [App\Http\Controllers\Auth\CollaboratorResetPasswordController::class, 'reset'])->name('resetPassword.collaborator.submit'); // envia um email com o token de verificação
    Route::get('/register', [App\Http\Controllers\Auth\CollaboratorRegisterController::class, 'index'])->name('register.collaborator'); // formulário de novo colaborador
    Route::post('/register', [App\Http\Controllers\Auth\CollaboratorRegisterController::class, 'store'])->name('register.collaborator.submit'); // adicioanr novo colaborador
    // interno
    Route::get('', [App\Http\Controllers\Auth\CollaboratorController::class, 'index'])->name('dashboard.collaborator');
    Route::get('/redefine-password', 'App\Http\Controllers\Auth\CollaboratorController@formRedefinePassword')->name('dashboard.collaborator.redefine.password'); // formulário de redefinir senha
    Route::post('/redefine-password', 'App\Http\Controllers\Auth\CollaboratorController@submitRedefinePassword')->name('dashboard.collaborator.redefine.password.submit'); // salvar uma nova senha
    Route::get('/personal-information', 'App\Http\Controllers\Auth\CollaboratorController@formPersonalInfo')->name('dashboard.collaborator.personal.info');
    Route::post('/personal-information', 'App\Http\Controllers\Auth\CollaboratorController@submitPersonalInfo')->name('dashboard.collaborator.personal.info.save');
    Route::put('/personal-information', 'App\Http\Controllers\Auth\CollaboratorController@personalInfoUpdate')->name('dashboard.collaborator.personal.info.update');
    Route::get('/recommendation-letter', 'App\Http\Controllers\Auth\CollaboratorCollaboratorsController@formRecommendationLetter')->name('dashboard.collaborator.recommandation.letter');
    Route::post('/recommendation-letter', 'App\Http\Controllers\Auth\CollaboratorCollaboratorsController@submitRecommendationLetter')->name('dashboard.collaborator.recommandation.letter.save');

    Route::get('/exam', 'App\Http\Controllers\CollaboratorExamController@index')->name('dashboard.collaborator.exam');
    Route::get('/new-exam', 'App\Http\Controllers\CollaboratorExamController@formNewExam')->name('dashboard.collaborator.new.exam');
    Route::post('/new-exam', 'App\Http\Controllers\CollaboratorExamController@submitNewExam')->name('dashboard.collaborator.new.exam.save');
    Route::put('/new-exam', 'App\Http\Controllers\CollaboratorExamController@newExamUpdate')->name('dashboard.collaborator.new.exam.update');
    Route::get('/previous-exam', 'App\Http\Controllers\CollaboratorExamController@formPreviousExam')->name('dashboard.collaborator.previous.exam');
    
    Route::get('/collaborators', 'App\Http\Controllers\CollaboratorCollaboratorsController@index')->name('dashboard.collaborator.list');
    Route::get('/{:id}/personal-information', 'App\Http\Controllers\CollaboratorCollaboratorsController@formCollaboratorPersonalInfo')->name('dashboard.collaborator.collaborator.personal.info');
    Route::put('/{:id}/personal-information', 'App\Http\Controllers\CollaboratorCollaboratorsController@collaboratorPersonalInfoUpdate')->name('dashboard.collaborator.collaborator.personal.info.update');
    Route::put('/{:id}/nivel', 'App\Http\Controllers\CollaboratorCollaboratorsController@collaboratorNivelUpdate')->name('dashboard.collaborator.collaborator.nivel.update');
    Route::delete('/{:id}', 'App\Http\Controllers\CollaboratorCollaboratorsController@collaboratorsDelete')->name('dashboard.collaborator.collaborator.delete');
    
    Route::get('/students', 'App\Http\Controllers\CollaboratorStudentsController@index')->name('dashboard.collaborator.students');
    
    Route::prefix('student')->group(function () {
        Route::get('/{:id}/personal-information', 'App\Http\Controllers\CollaboratorStudentsController@formStudentPersonalInformation')->name('dashboard.collaborator.student.personal-info');
        Route::put('/{:id}/personal-information', 'App\Http\Controllers\CollaboratorStudentsController@studentPersonalInformationUpdate')->name('dashboard.collaborator.student.personal.info.update');
        Route::get('/{:id}/institution', 'App\Http\Controllers\CollaboratorStudentsController@formStudentInstituition')->name('dashboard.collaborator.students.institution');
        Route::put('/{:id}/institution', 'App\Http\Controllers\CollaboratorStudentsController@studentInstituitionUpdate')->name('dashboard.collaborator.students.institution.update');
        Route::get('/{:id}/area', 'App\Http\Controllers\CollaboratorStudentsController@formStudentArea')->name('dashboard.collaborator.students.area');
        Route::put('/{:id}/area', 'App\Http\Controllers\CollaboratorStudentsController@studentAreaUpdate')->name('dashboard.collaborator.students.area.update');
        Route::get('/{:id}/document', 'App\Http\Controllers\CollaboratorStudentsController@formStudentDocument')->name('dashboard.collaborator.student.document');
        Route::put('/{:id}/document', 'App\Http\Controllers\CollaboratorStudentsController@studentDocumentUpdate')->name('dashboard.collaborator.student.document.update');
        Route::get('/{:id}/recommnedation-letter', 'App\Http\Controllers\CollaboratorStudentsController@formStudentRecommendationLetter')->name('dashboard.collaborator.student.document');
        Route::put('/{:id}/recommendation-letter', 'App\Http\Controllers\CollaboratorStudentsController@studentRecommendationLetterUpdate')->name('dashboard.collaborator.student.document.update'); 
        Route::delete('/{:id}', 'App\Http\Controllers\CollaboratorStudentsController@studentDelete')->name('dashboard.collaborator.student');
    });
    
    Route::prefix('relatorio')->group(function () {
        Route::get('/1', 'App\Http\Controllers\CollaboratorRelatorioController@formRelatorio1');
        Route::get('/2', 'App\Http\Controllers\CollaboratorRelatorioController@formRelatorio2');
        Route::get('/3', 'App\Http\Controllers\CollaboratorRelatorioController@formRelatorio3');
        Route::get('/4', 'App\Http\Controllers\CollaboratorRelatorioController@formRelatorio4');
        Route::get('/5', 'App\Http\Controllers\CollaboratorRelatorioController@formRelatorio5');
        Route::get('/6', 'App\Http\Controllers\CollaboratorRelatorioController@formRelatorio6');
        Route::get('/7', 'App\Http\Controllers\CollaboratorRelatorioController@formRelatorio7');
        Route::get('/8', 'App\Http\Controllers\CollaboratorRelatorioController@formRelatorio8');
        Route::get('/9', 'App\Http\Controllers\CollaboratorRelatorioController@formRelatorio9');
        Route::post('/1', 'App\Http\Controllers\CollaboratorRelatorioController@submitRelatorio1');
        Route::post('/2', 'App\Http\Controllers\CollaboratorRelatorioController@submitRelatorio2');
        Route::post('/3', 'App\Http\Controllers\CollaboratorRelatorioController@submitRelatorio3');
        Route::post('/4', 'App\Http\Controllers\CollaboratorRelatorioController@submitRelatorio4');
        Route::post('/5', 'App\Http\Controllers\CollaboratorRelatorioController@submitRelatorio5');
        Route::post('/6', 'App\Http\Controllers\CollaboratorRelatorioController@submitRelatorio6');
        Route::post('/7', 'App\Http\Controllers\CollaboratorRelatorioController@submitRelatorio7');
        Route::post('/8', 'App\Http\Controllers\CollaboratorRelatorioController@submitRelatorio8');
        Route::post('/9', 'App\Http\Controllers\CollaboratorRelatorioController@submitRelatorio9');
    });
});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
