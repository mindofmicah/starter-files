<?php
Route::get('/', function () {
    return View::make('home');
});

Route::group(array('prefix' => 'admin'), function () {
    
});
