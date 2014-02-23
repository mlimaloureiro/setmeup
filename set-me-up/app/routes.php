<?php


Route::get('/', function() { return View::make('main'); });

Route::get('/twitter/username/availability/{username}', 'TwitterControllerHandler@checkAvailability');
Route::get('/facebook/username/availability/{username}', 'FacebookControllerHandler@checkAvailability');
Route::get('/linkedin/username/availability/{username}', 'LinkedInControllerHandler@checkAvailability');
Route::get('/instagram/username/availability/{username}', 'InstagramControllerHandler@checkAvailability');

Route::post('/facebook/automateInput/', 'FacebookControllerHandler@automateInput');
Route::post('/twitter/automateInput/', 'TwitterControllerHandler@automateInput');
