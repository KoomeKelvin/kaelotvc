<?php

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



Route::get('/', 'FrontEndController@gallery');
Route::any('/search', 'FrontendController@search')->name('frontend.search');
Route::view('/vision', 'frontend.vision.index');
Route::view('/automotive', 'frontend.departments.automotive')->name('department.automotive');
Route::view('/building', 'frontend.departments.building')->name('department.building');
Route::view('/business', 'frontend.departments.business')->name('department.business');
Route::view('/electrical', 'frontend.departments.electrical')->name('department.electrical');
Route::view('/ict', 'frontend.departments.ict')->name('department.ict');
Route::get('/application', 'FrontEndController@applications')->name('frontend.applications');
Route::post('/submit_application', 'FrontEndController@submit_application')->name('application.submission');
Route::get('/apply/{id}', 'FrontEndController@apply')->name('frontend.apply');
Route::get('/contact_us', 'FrontendController@contact')->name('frontend.contact');
Route::post('/frontend/feedback', 'FrontEndController@feedback')->name('frontend.feedback');
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::post('trainer/logout', 'Auth\LoginController@trainerLogout')->name('trainer.logout');
Route::prefix('manage')->middleware('role:su|principal|registrar|hod|classteacher|trainer')->group(function(){
Route::get('/profile', 'UsersController@profile')->name('user.profile');
Route::post('/profile/update', 'UsersController@profileUpdate')->name('profile.update');
Route::resource('/users', 'UsersController')->middleware('role:su|principal');
Route::resource('/permissions', 'PermissionController')->middleware('role:su|principal');
Route::resource('/roles', 'RoleController')->middleware('role:su|principal');
Route::any('/courses_search', 'CoursesController@searchCourses')->name('search.courses')->middleware('role:su|principal|registrar');
Route::resource('/courses', 'CoursesController')->middleware('role:su|principal|registrar');
Route::resource('/posts', 'PostsController')->middleware('role:su|principal');
Route::any('/theclasses_search', 'TheClassesController@searchClasses')->name('classes.search')->middleware('role:su|principal|registrar|hod');
Route::resource('/theclasses', 'TheClassesController')->middleware('role:su|principal|registrar|hod');
Route::any('/units_search', 'UnitsController@search')->name('units.search')->middleware('role:su|principal|registrar|hod');
Route::resource('/units', 'UnitsController')->middleware('role:su|principal|registrar|hod');
Route::any('/search_marks', 'MarksController@searchClass')->name('search.class.marks')->middleware('role:su|principal|registrar|hod|classteacher|trainer');
Route::get('/marksheet/{id}/{class_id}', 'MarksController@marksheet')->name('marksheet')->middleware('role:su|principal|registrar|hod|classteacher|trainer');;
Route::post('/marksheet_entry', 'MarksController@marksentry')->name('marksentry')->middleware('role:su|principal|registrar|hod|classteacher|trainer');;
Route::get('/marksheet_view/{id}/{class_id}', 'MarksController@marksheet_view')->name('marksheet_view')->middleware('role:su|principal|registrar|hod|classteacher|trainer');;
Route::resource('/marks', 'MarksController')->middleware('role:su|principal|registrar|hod|classteacher|trainer');
Route::resource('/files', 'FilesController')->middleware('role:su|principal|registrar|hod|classteacher|trainer');
Route::get('/elimisha/{id}', 'DiscussionsController@elimisha')->name('elimisha')->middleware('role:su|principal|registrar|hod|classteacher|trainer');
Route::get('/elimishafeedback/{id}', 'DiscussionsController@elimishaFeedback')->name('elimishafeedback')->middleware('role:su|principal|registrar|hod|classteacher|trainer');
Route::get('/elimishacomments/{id}', 'DiscussionsController@elimishaComments')->name('elimishacomments')->middleware('role:su|principal|registrar|hod|classteacher|trainer');
Route::resource('/discussion', 'DiscussionsController')->middleware('role:su|principal|registrar|hod|classteacher|trainer');
Route::view('/dashboard', 'manage.dashboard')->name('manage.dashboard');
});
Route::prefix('registered_students')->middleware('role:su|principal')->group(function(){
Route::get('/', 'RegisteredStudentsController@index')->name('registered.index');
Route::resource('/students', 'RegisteredStudentsController');
Route::any('/search', 'RegisteredStudentsController@search')->name('registered.search');
Route::get('/export', 'RegisteredStudentsController@export')->name('export');
Route::get('/search_export', 'RegisteredStudentsController@searchExport')->name('search.export');

});

// Routes for the creating the student login 
Route::prefix('student')->group(function(){
    Route::get('/login', 'Auth\StudentLoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'Auth\StudentLoginController@login')->name('student-login-submit');
    Route::get('/', "StudentController@index")->name('student_dashboard');
    Route::post('/logout', 'Auth\StudentLoginController@logout')->name('student.logout');


    // Routes for resetting passwords for the students 
    Route::post('/password/email', 'Auth\StudentForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
    Route::get('/password/reset', 'Auth\StudentForgotPasswordController@showLinkRequestForm')->name('student.password.request');
    Route::post('/password/reset', 'Auth\StudentResetPasswordController@reset')->name('student.password.update');
    Route::get('/password/reset/{token}', 'Auth\StudentResetPasswordController@showResetForm')->name('student.password.reset');
});
Route::get('/student_admission', 'FrontEndController@admission')->name('frontend.admission');
Route::resource('/admissions', 'AdmissionsController');
Route::get('/student_profile', 'StudentResultsController@studentProfile')->name('student.profile');
Route::post('/student_profile/update', 'StudentResultsController@studentProfileUpdate')->name('student.profile.update');
Route::get('/student_result', 'StudentResultsController@index')->name('student.results');
Route::get('/student_result/download/{id}/{term}', 'StudentResultsController@download_results')->name('student.results.download');
//  Elearning links for students
Route::get('/get_units', 'StudentDiscussionController@getUnits')->name('units.get');
Route::get('/get_discussions/{unit_id}', 'StudentDiscussionController@getDiscussions')->name('discussions.get');
Route::get('/get_single_discussions/{id}', 'StudentDiscussionController@getsingleDiscussions')->name('discussions.single');



// additional files for clearing the cache when need arises	
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::get('/view-cache', function() {
    Artisan::call('view:clear');
    return "view cache is cleared";
});
Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return "Cache is configured";
});
