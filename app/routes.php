<?php

Route::get('/', 'BlogController@Index');

/**
 * Blog route
 */
Route::resource('blog', 'BlogController');

/**
 * Routes for the articles
 */
Route::resource('articles', 'ArticlesController');

/**
 * Routes for the comments
 */
Route::post('comments', 'CommentsController@create');
