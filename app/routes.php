<?php
View::composer('admin.nav', function($view) {
    $admin_links = AdminLink::orderBy('order')->get(array('href', 'label'));
    $view->with('links', $admin_links);
});
Route::get('/', function () {
    return View::make('hello');
});

Route::group(array('prefix' => 'admin'), function () {
    
});
