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

Route::get('/', 'DashboardController@index');

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function(){
 
    // Middleware Question

    Route::get('/question/create','QuestController@ShowCreate');
    Route::post('/question','QuestController@CreateQuest');
    Route::get('/question/{id}/edit', 'QuestController@ShowEdit');
    Route::put('/question/{id}', 'QuestController@EditQuest');
    Route::delete('/question/{id}', 'QuestController@DeleteQuest');
    
    Route::get('/answer/{question_id}/create','AnswerController@ShowCreate');
    Route::post('/answer/{question_id}','AnswerController@CreateAnswer');
    Route::get('/answer/{answer_id}/edit', 'AnswerController@ShowEdit');
    Route::put('/answer/{answer_id}', 'AnswerController@EditAnswer');
    Route::delete('/answer/{question_id}', 'AnswerController@DeleteAnswer');
    
    //Middleware User
    Route::get('/profile', 'ProfileController@index');
    Route::get('/vote/question/{question_id}', 'VoteController@questionVote');
    Route::get('/vote/answer/{question_id}', 'VoteController@answerVote');
    Route::get('/downvote/question/{question_id}', 'VoteController@questionDownVote');
    Route::get('/downvote/answer/{question_id}', 'VoteController@answerDownVote');

});

//Route Question
Route::get('/question','QuestController@ShowList');
Route::get('/question/{id}', 'QuestController@DetailQuest');

//Route Answer
Route::get('/answer','AnswerController@ShowAnswer');
Route::get('/answer/{id}', 'AnswerController@DetilAnswer');
