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

// middleware auth collaborator
Route::middleware('auth:collaborator')->group( function () {
    Route::get('/participation-instituion', 'ParticipationInstituionController@index')->name('participation.instituion');
    Route::get('/participation-instituion/{id}', 'ParticipationInstituionController@showFormUpdate')->name('participation.instituion.update');
    Route::put('/participation-instituion/{id}', 'ParticipationInstituionController@update')->name('participation.instituion.update');

    Route::get('/new-exam-period', 'ExamCreateController@createNewPeriodExamConfig')->name('dashboard.new.exam.period');
    Route::post('/new-exam-period', 'ExamCreateController@postNewPeriodExamConfig')->name('dashboard.new.exam.period.post');
    Route::get('/new-exam-registration', 'ExamCreateController@createNewRegistrationExamConfig')->name('dashboard.new.exam.registration');
    Route::post('/new-exam-registration', 'ExamCreateController@postNewRegistrationExamConfig')->name('dashboard.new.exam.registration.post');
    Route::get('/new-exam-exam', 'ExamCreateController@createNewExamExamConfig')->name('dashboard.new.exam.exam');
    Route::post('/new-exam-exam', 'ExamCreateController@postNewExamExamConfig')->name('dashboard.new.exam.exam.post');
    Route::get('/new-exam-complement', 'ExamCreateController@createNewComplementExamConfig')->name('dashboard.new.exam.complement');
    Route::post('/new-exam-complement', 'ExamCreateController@postNewComplementExamConfig')->name('dashboard.new.exam.complement.post');
    Route::get('/new-exam-interview', 'ExamCreateController@createNewInterviewExamConfig')->name('dashboard.new.exam.interview');
    Route::post('/new-exam-interview', 'ExamCreateController@postNewInterviewExamConfig')->name('dashboard.new.exam.interview.post');
    Route::get('/new-exam-passingscore', 'ExamCreateController@createNewPassingscoreExamConfig')->name('dashboard.new.exam.passingscore');
    Route::post('/new-exam-passingscore', 'ExamCreateController@postNewPassingscoreExamConfig')->name('dashboard.new.exam.passingscore.post');
    Route::get('/new-exam-conclusion', 'ExamCreateController@createNewExamConclusion')->name('dashboard.new.exam.conclusion');
    Route::post('/new-exam-conclusion', 'ExamCreateController@postNewExamConclution')->name('dashboard.new.exam.conclusion.post');
    
    Route::get('/exam', 'ExamDataController@showExam')->name('dashboard.exam');
    Route::get('/exam-active/{id}', 'ExamDataController@showExamEdit')->name('dashboard.exam.active');
    Route::put('/exam-active/{id}', 'ExamDataController@updateExamEdit')->name('dashboard.exam.active.update');
    // Route::get('/previous-exam', 'ExamDataController@listExamPrevious')->name('dashboard.previous.exam.list');
    Route::get('/previous-exam/{id}', 'ExamDataController@showExamEdit')->name('dashboard.exam.inative');
    Route::put('/previous-exam/{id}', 'ExamDataController@updateExamEdit')->name('dashboard.exam.inative.update');
    
    Route::get('/redefine-password', 'RedefineController@form')->name('dashboard.redefine.password'); // formulário de redefinir senha
    Route::post('/redefine-password', 'RedefineController@submit')->name('dashboard.redefine.password.submit'); // salvar uma nova senha

    Route::get('/personal-information', 'PersonalInfoController@form')->name('dashboard.personal.info');
    Route::post('/personal-information', 'PersonalInfoController@submit')->name('dashboard.personal.info.save');
    Route::put('/personal-information', 'PersonalInfoController@update')->name('dashboard.personal.info.update');
    // Route::get('/recommendation-letter', 'RecommendationLetterController@form')->name('dashboard.recommandation.letter');
    // Route::post('/recommendation-letter', 'RecommendationLetterController@submit')->name('dashboard.recommandation.letter.save');

    Route::prefix('collaborators')->group(function () {
        Route::get('/', 'CollaboratorsController@list')->name('dashboard.collaborator.list');
        Route::get('/{id}/personal-information', 'CollaboratorsController@formInfo')->name('dashboard.collaborator.personal-info');
        Route::put('/{id}/personal-information', 'CollaboratorsController@updateInfo')->name('dashboard.collaborator.personal-info.update');
        Route::put('/{id}/nivel', 'CollaboratorsController@updateNivel')->name('dashboard.collaborator.collaborator.nivel.update');
        Route::delete('/{:id}', 'CollaboratorsController@delete')->name('dashboard.collaborator.delete');
    });

    Route::prefix('students')->group(function () {
        Route::get('/', 'StudentsController@list')->name('dashboard.student');
        Route::get('/{:id}/personal-information', 'StudentsController@formInfo')->name('dashboard.student.personal-info');
        Route::put('/{:id}/personal-information', 'StudentsController@UpdateInfo')->name('dashboard.student.personal-info.update');
        Route::get('/{:id}/institution', 'StudentsController@formInstituition')->name('dashboard.student.institution');
        Route::put('/{:id}/institution', 'StudentsController@InstituitionUpdate')->name('dashboard.student.institution.update');
        Route::get('/{:id}/area', 'StudentsController@formArea')->name('dashboard.student.area');
        Route::put('/{:id}/area', 'StudentsController@AreaUpdate')->name('dashboard.student.area.update');
        Route::get('/{:id}/document', 'StudentsController@formDocument')->name('dashboard.student.document');
        Route::put('/{:id}/document', 'StudentsController@DocumentUpdate')->name('dashboard.student.document.update');
        Route::get('/{:id}/recommnedation-letter', 'StudentsController@formRecommendationLetter')->name('dashboard.student.document');
        Route::put('/{:id}/recommendation-letter', 'StudentsController@recommendationLetterUpdate')->name('dashboard.student.document.update'); 
        Route::delete('/{:id}', 'StudentsController@delete')->name('dashboard.student.delete');
    });

});




// Route::put('/new-exam', 'App\Http\Controllers\CollaboratorExamController@newExamUpdate')->name('dashboard.collaborator.new.exam.update');




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
