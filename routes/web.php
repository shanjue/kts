<?php

/*home ႏွင့္သက္ဆိုင္ရာမ်ား*/
Route::get('/', 'HomeController@index');
Route::get('/cpanel','HomeController@cpanel');
Route::get('/blog','HomeController@blog');
Route::get('/viewpost/{id}','HomeController@viewpost');
Route::get('/categoryfilter/{category}','HomeController@categoryfilter');
Route::get('/allusers','HomeController@allusers');
Route::get('/gallery','HomeController@gallery');
Route::get('/moregallery/{id}','HomeController@moregallery');
/*End home ႏွင့္ သက္ဆုိင္ရာမ်ား*/

/*post ဆုိင္ရာ*/
Route::get('/addpost','ControlPanelController@addpost');
Route::post('addpost','ControlPanelController@submitpost')->name('addpost');
Route::get('/editpost/{id}','ControlPanelController@editpost');
Route::post('/editpost/{id}','ControlPanelController@submiteditpost');
Route::get('/mypost/{id}','ControlPanelController@mypost');
/*End post ဆုိင္ရာ*/

/*gallery ဆုိင္ရာ*/

Route::get('/yourgallery/{id}','ControlPanelController@yourgallery');
Route::post('/yourgallery/{id}','ControlPanelController@yourgallerysubmit');
Route::get('/editgallery/{id}','ControlPanelController@editgallery');
Route::post('/editgallery/{id}','ControlPanelController@updategallery');
Route::get('/delgallery/{id}','ControlPanelController@delgallery');
/*End gallery*/

/*Start Test ဆုိင္ရာ*/
Route::get('/testslimscroll','TestController@testslimscroll');
Route::get('/testimagecrop',['uses'=>'TestController@testimagecrop']);
Route::post('/testimagecrop','TestController@testimagecroppost');
Route::get('/testjquerycrop','TestController@testjquerycrop');
Route::post('/testjquerycrop','TestController@testjquerycroppost');
/*End Test ဆုိင္ရာ*/

/*Category ဆုိင္ရာ*/
Route::get('/cat','ControlPanelController@cat');
/*--XHR*/ Route::post('/addcat','ControlPanelController@addcat');
/*--XHR*/ Route::post('/catdel','ControlPanelController@catdel');
/*--XHR*/ Route::post('/catupdate','ControlPanelController@catupdate');

Auth::routes();
/*Start User image ႏွင့္သက္ဆုိင္ရာ*/

/*End User image ႏွင့္သက္ဆုိင္ရာ*/
