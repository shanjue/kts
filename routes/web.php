<?php


/*Start Profile ႏွင့္သက္ဆုိင္ရာ*/
Route::get('/allprofile','ProfileController@allprofile');
Route::get('/yourprofile','ProfileController@yourprofile');

/*End Profile ႏွင့္သက္ဆုိင္ရာ 1234*/

/*home ႏွင့္သက္ဆိုင္ရာမ်ား*/
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('user/imagecropuser','HomeController@imagecropuser');
Route::get('/cpanel','HomeController@cpanel');
Route::get('/blog','HomeController@blog');
Route::get('/userpost/{id}','HomeController@post');
Route::get('/categoryfilter/{category}','HomeController@categoryfilter');
/*End home ႏွင့္ သက္ဆုိင္ရာမ်ား*/

/*post ဆုိင္ရာ*/
Route::get('/post/addpost','ControlPanelController@addpost');
Route::post('/post/addpost','ControlPanelController@submitpost')->name('addpost');
Route::get('/viewpost/{id}','ControlPanelController@viewpost');
Route::post('/post/imagecroppost','ControlPanelController@imagecroppost');
Route::get('/imagecroppostdel/{id}','ControlPanelController@imagecroppostdel');
Route::get('/post/showallposts','ControlPanelController@showallposts');
Route::get('/photogallery','ControlPanelController@photogallery');
/*End post ဆုိင္ရာ*/

/*Start Test ဆုိင္ရာ*/
Route::get('/testslimscroll','TestController@testslimscroll');
Route::get('/testimagecrop',['uses'=>'TestController@testimagecrop']);
Route::post('/testimagecrop','TestController@testimagecroppost');
/*End Test ဆုိင္ရာ*/

/*Category ဆုိင္ရာ*/
Route::get('/cat','ControlPanelController@cat');
/*--XHR*/ Route::post('/addcat','ControlPanelController@addcat');
/*--XHR*/ Route::post('/catdel','ControlPanelController@catdel');
/*--XHR*/ Route::post('/catupdate','ControlPanelController@catupdate');

Auth::routes();
/*Start User image ႏွင့္သက္ဆုိင္ရာ*/

/*End User image ႏွင့္သက္ဆုိင္ရာ*/
