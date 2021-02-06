<?php

use Illuminate\Support\Facades\Route;

// Route::get('/login', 'LoginController@showLoginForm')->name('login');

// Route::middleware('auth:collaborator')->group(function() {
//     Route::get('', 'DashBoardController@index')->name('dashboard');
// });

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/forgot-password', 'Auth\ForgotPasswordController@index')->name('forgotPassword'); // formulário de esqueceu a senha
Route::post('/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('forgotPassword.submit'); // envia um email com o token de verificação
Route::get('/reset-password', 'Auth\ResetPasswordController@index')->name('resetPassword'); // formulário de esqueceu a senha
Route::post('/reset-password', 'Auth\ResetPasswordController@reset')->name('resetPassword.submit'); // envia um email com o token de verificação
Route::get('/verify', 'Auth\VerificationController@index')->name('verify'); // formulário de novo estudante
Route::get('/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verify.submit'); // formulário de novo estudante
Route::post('/verify', 'Auth\VerificationController@resend')->name('verify.resend'); // formulário de novo estudante
Route::get('/confirm', 'Auth\ConfirmPasswordController@index')->name('confirm'); // formulário de novo colaborador
Route::post('/confirm', 'Auth\ConfirmPasswordController@confirm')->name('confirm.submit'); // formulário de novo colaborador
Route::get('/register', 'Auth\RegisterController@index')->name('register'); // formulário de novo colaborador
Route::post('/register', 'Auth\RegisterController@store')->name('register.submit'); // adicioanr novo colaborador
// interno
Route::get('', 'DashBoardController@index')->name('dashboard');
Route::get('/participation-instituion', 'ParticipationInstituionController@index')->name('participation.instituion');
Route::get('/participation-instituion/{id}', 'ParticipationInstituionController@showFormUpdate')->name('participation.instituion.update');
Route::put('/participation-instituion/{id}', 'ParticipationInstituionController@update')->name('participation.instituion.update');
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
