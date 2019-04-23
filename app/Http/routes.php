<?php



//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/', function () {
    return view('home');
});

Route::auth();


Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

//Route::get('/home/{id}', ['as'=>'home.home', 'uses'=>'HomeController@category']);



//Route::group(['middleware'=>'admin'], function(){

    Route::get('/admin', function(){

        return view('admin.index');


    });


    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('admin/categories', 'AdminCategoriesController');

    Route::resource('admin/media', 'AdminMediasController');

Route::post('', 'CommentRepliesController@createReply');


    Route::resource('admin/comments', 'PostCommentsController');

    Route::resource('admin/comment/replies', 'CommentRepliesController');

    //
//Route::resource('a', 'CommentRepliesController');

//});



//Route::group(['middleware'=>'auth'], function(){



    Route::post('comment/reply', 'CommentRepliesController@createReply');



//});
Route::auth();

Route::get('/Front', 'HomeshowController@index');

Route::get('/logouts', 'HomeshowController@create');