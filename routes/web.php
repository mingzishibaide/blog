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
Route::post('/ajax/getblog/{page}','BlogController@getblog');
Route::get('/', 'BlogController@index')->name('index');
Route::get('/about', 'BlogController@about')->name('about');
Route::get('/gbook', 'BlogController@gbook')->name('gbook');
Route::get('/info/{id}', 'BlogController@info')->name('info');
Route::get('/list/{id}', 'BlogController@list')->name('list');

Route::get('/time', 'BlogController@time')->name('time');
Route::get('/life', 'BlogController@life')->name('life');


Route::post('/admin/gbook', 'MessageController@addgbook')->name('addgbook');


Route::middleware(['login'])->group(function () {
    Route::get('/admin', function () {
        return view('/admin/index');
    });
    
    
    Route::get('/admin/category', 'CatController@category')->name('category');
    Route::post('/admin/addcat', 'CatController@addCat')->name('addcat');
    Route::get('/admin/cateedit/{id}', 'CatController@cateedit')->name('cateedit');
    Route::post('/admin/editcate/{id}', 'CatController@editcate')->name('editcate');
    Route::post('/admin/delcate/{id}', 'CatController@delcate')->name('delcate');
    
    
    Route::get('/admin/commentlist', 'MessageController@commentlist')->name('commentlist');
    Route::post('/admin/delcomment/{id}', 'MessageController@delcomment')->name('delcomment');
    
    
    Route::get('/admin/questionadd', 'BlogController@questionadd')->name('questionadd');
    Route::post('/admin/addquestion', 'BlogController@addquestion')->name('addquestion');
    
    Route::post('/admin/img', 'BlogController@img')->name('img');
    
    
    Route::get('/admin/questionedit/{id}', 'BlogController@questionedit')->name('questionedit');
    Route::post('/admin/editquestion/{id}', 'BlogController@editquestion')->name('editquestion');
    Route::get('/admin/questionlist', 'BlogController@questionlist')->name('questionlist');
    Route::post('/admin/delquestion/{id}', 'BlogController@delquestion')->name('delquestion');
    
    Route::get('/admin/linklist', 'LinkController@linklist')->name('linklist');
    Route::post('/admin/delquestion/{id}', 'BlogController@delquestion')->name('delquestion');
    Route::get('/admin/linkadd', 'LinkController@linkadd')->name('linkadd');
    Route::post('/admin/addlink', 'LinkController@addlink')->name('addlink');
    Route::post('/admin/dellink/{id}', 'LinkController@dellink')->name('dellink');
    
    
    Route::post('/admin/delimg', 'BlogController@delimg')->name('delimg');
    
    Route::post('/admin/like/{id}', 'BlogController@like')->name('like');
});