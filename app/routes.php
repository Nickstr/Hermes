<?php

// Questions
Route::group(array('prefix' => 'questions'), function()
{
    // Question routes
    Route::get('/', 'Hermes\Questions\Controllers\QuestionController@index');
    Route::get('{uniqueId}/{slug}', 'Hermes\Questions\Controllers\QuestionController@show');

    // Answer routes
    Route::post('answer/create', 'Hermes\Questions\Controllers\AnswerController@create');

    // Voting routes
    Route::get('question/{uniqueId}/voteup', 'Hermes\Questions\Controllers\QuestionController@voteUp');
    Route::get('question/{uniqueId}/votedown', 'Hermes\Questions\Controllers\QuestionController@voteDown');

    Route::get('answer/{answerId}/voteup', 'Hermes\Questions\Controllers\AnswerController@voteUp');
    Route::get('answer/{answerId}/votedown', 'Hermes\Questions\Controllers\AnswerController@voteDown');
});