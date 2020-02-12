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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/questionnaires/create', 'QuestionnaireController@create');
Route::post('/questionnaires', 'QuestionnaireController@store');
Route::get('/questionnaires/{questionnaire}', 'QuestionnaireController@show');
Route::get('/questionnaires/{questionnaire}/edit', 'QuestionnaireController@edit')->name('questionnaires.edit');
Route::put('/questionnaires/{questionnaire}', 'QuestionnaireController@update')->name('questionnaires.update');
Route::delete('/questionnaire/{questionnaire}', 'QuestionnaireController@destroy');


Route::get('/questionnaires/{questionnaire}/questions/create', 'QuestionController@create');
Route::post('/questionnaires/{questionnaire}/questions', 'QuestionController@store');
Route::get('/questionnaires/{questionnaire}/questions/{question}/edit', 'QuestionController@edit')->name('question.edit');
Route::put('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@update')->name('question.update');
Route::delete('/questionnaires/{questionnaire}/questions/{question}', 'QuestionController@destroy');

Route::get('/surveys/{questionnaire}-{slug}', 'SurveyController@show');
Route::post('/surveys/{questionnaire}-{slug}', 'SurveyController@store');
