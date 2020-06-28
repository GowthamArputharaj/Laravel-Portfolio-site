<?php

use Illuminate\Support\Facades\Route;

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

/* 
Route::get('/', function(){
    return view('');
}); */

/* For routing */

Route::get('/','Dbcontroller@index');

Route::get('/about', function(){
    return view('pages.about');
})->named('about');

Route::get('/contact', function(){
    return view('pages.contact');
})->named('contact');

/* Route::get('resume', 'Dbcontroller@downl'); */
/* Route::get('resume', 'Dbcontroller@update'); */


Route::resource('study', 'Dbcontroller');

Route::get('/emaill', 'HomeController@mail');

/* For Authentication */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*



Route::get('mail', 'RoleController@mail');

Route::get('laravelemail', 'RoleController@sendEmail');




Route::get('/welcome', function () {
    return view('welcome');    
})->name('welco');

Route::any('/signedroutes/{key}', function(){
    return 'Gowtham'.URL::full();
})->name('signed');

Route::get('/forms', function(){
    return view('delete.form2');
});

Route::any('/sign', function(){
    return URL::signedRoute('signed', ['key' => 'Keyssss']);
});

Route::prefix('/gowtham')->middleware('throttle:10,1')->group(function(){
    Route::get('/one', function() {
        return URL::to('cookie');
    });
});

#Route::get('/controle', 'RoleController');

Route::post('{user}.gov.in/com/{pass}', function ($use, $pass) {
    return view('delete.user',['user' => $use, 'pass' => $pass]);
})->where(['user' => '[a-zA-Z]+', 'pass' => '[0-9]+']);

Route::get('/cookie',function() {
    return response("Hello", 200)->header('Content-Type', 'text/css')
       ->withcookie('name','Virat Gandhi', (int)5);
 });


Route::get('downl', 'RoleController@downl');

Route::get('upl', 'RoleController@upl');

Route::middleware('throttle:60,1,delete')->group(function () {
    Route::any('/welc', function () {
        return view('welcome');  
    });
});

Route::get('/go', function() {
    return view('delete.nothing');
})->middleware(Role::class);

Route::get('reg', function() {
    
    return view('delete.forform');
});

Route::get('/form', 'RoleController@forms');



Route::get('/post/{post}', function () {
    echo "Hell World Laravel";
    sleep(4);
    return redirect('pos');
})->name('post.show');

Route::get('pos', function() {
    echo route('post.show', ['post' => 1]);
    #redirect($ur);abort(401);
    return "route('post.show', ['post' => 1]);";
});

Route::get('example', function() {
    URL::asset('image/img');
});

Route::get('lets/{one}', function($one){
    return 'This is lets return statement'.$one;
})->name('lets.return');

Route::fallback(function() {
    return URL::full();
});
*/
