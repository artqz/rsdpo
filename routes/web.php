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

Route::get('/', function () {
    return view('welcome');
});

/* --- Пользователи */
Route::get('admin/users', 'Admin\UserController@index');
Route::get('admin/users/create', 'Admin\UserController@create');
Route::post('admin/users', 'Admin\UserController@store');
Route::get('admin/users/{id}', 'Admin\UserController@show');
Route::post('admin/users/{id}/update_info', 'Admin\UserController@update_info');
Route::post('admin/users/{id}/update_password', 'Admin\UserController@update_password');
Route::post('admin/users/{id}/update_photo', 'Admin\UserController@update_photo');
Route::get('admin/users/{id}/delete', 'Admin\UserController@delete');
Route::get('admin/users/{id}/restore', 'Admin\UserController@restore');

/* --- Учебные программы */
Route::get('admin/programs', 'Admin\ProgramsController@index');
Route::get('admin/programs/create', 'Admin\ProgramsController@create');
Route::post('admin/programs', 'Admin\ProgramsController@store');
Route::get('admin/programs/{id}', 'Admin\ProgramsController@show');
Route::post('admin/programs/{id}/update', 'Admin\ProgramsController@update');
Route::get('admin/programs/{id}/delete', 'Admin\ProgramsController@delete');
Route::get('admin/programs/{id}/restore', 'Admin\ProgramsController@restore');

/* --- Разделы учебных программ */
Route::get('admin/programs/{id}/categories/create', 'Admin\CategoriesController@create');
Route::post('admin/programs/{id}/categories', 'Admin\CategoriesController@store');
Route::get('admin/categories/{id}', 'Admin\CategoriesController@show');
Route::get('admin/categories/{id}/delete', 'Admin\CategoriesController@delete');
Route::get('admin/categories/{id}/restore', 'Admin\CategoriesController@restore');

/* --- Учебные материалы */
Route::get('admin/categories/{id}/materials/create', 'Admin\MaterialsController@create');
Route::post('admin/categories/{id}/materials', 'Admin\MaterialsController@store');
Route::get('admin/materials/{id}/delete', 'Admin\MaterialsController@delete');
Route::get('admin/materials/{id}/restore', 'Admin\MaterialsController@restore');

/* --- Вопросы */
Route::get('admin/questions', 'Admin\QuestionsController@index');
Route::get('admin/questions/create', 'Admin\QuestionsController@create');
Route::post('admin/questions', 'Admin\QuestionsController@store');
Route::get('admin/questions/{id}', 'Admin\QuestionsController@show');
Route::post('admin/questions/{id}', 'Admin\QuestionsController@update');

/* --- Ответы */
Route::get('admin/questions/{id}/answers/create', 'Admin\AnswersController@create');
Route::post('admin/questions/{id}/answers', 'Admin\AnswersController@store');
Route::get('admin/answers/{id}', 'Admin\AnswersController@show');

/* Приложение */
/* --- Учебные база */
Route::get('base', 'BaseController@index');
Route::get('base/programs/{id}', 'BaseController@index_programs');
Route::get('base/programs/{id}/test', 'BaseController@test');
Route::get('base/materials/{id}', 'BaseController@show_materials');