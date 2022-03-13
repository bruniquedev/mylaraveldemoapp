<?php

use Illuminate\Support\Facades\Route;
//In the new version of laravel, it works like this Add This code
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\MessagingController;
use App\Http\Controllers\AjaxCrudController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DownloadFileController;

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




//this is different from other routings you see here,
//we have routed our pagescontroller from controllers and specified the function called from pagescontroller called index
//do'nt forget that we have specified it to be our index because of the single slash only
//via browser, this is ccessed like http://mylaraveldemoapp.loc/
//we return the view with in the index function in PagesController
//Route::get('/','PagesController@index'); //old routing way of laravel 7 and below
Route::get('/', [PagesController::class, 'Index']);//from laravel 8 new routing way
Route::get('/about', [PagesController::class, 'About']);//from laravel 8 new routing way
Route::get('/services', [PagesController::class, 'Services']);//from laravel 8 new routing way


//We can't add routes of all the functions in PostsController here , it will be too much code, but
//we will use a single route  for all functions in PostsController
Route::resource('posts', PostsController::class);//from laravel 8 new routing way

//am separating this for form submission above Route::resource('posts', PostsController::class) calling the func store
Route::post('store-form', [PostsController::class, 'store']);//call store function from PostsController

Route::get('messagesse', [MessagingController::class, 'messagescount']);//call 

//We can't add routes of all the functions in PostsController here , it will be too much code, but
//we will use a single route  for all functions in PostsController
Route::resource('todo', AjaxCrudController::class);

Route::get('products', [ProductsController::class,'index']);
Route::get('cart', [ProductsController::class,'cart']);
Route::get('add-to-cart/{id}', [ProductsController::class,'addToCart']);
Route::patch('update-cart', [ProductsController::class,'update']);
Route::delete('removefromcart', [ProductsController::class,'remove']);

Route::get('filedownload', [DownloadFileController::class, 'getDirectDownload'])->name('file.download.index');
Route::get('download/{id}', [DownloadFileController::class, 'getDynamicDownload'])->name('download');

/*
Now, you can add this to your web routes as a middleware. Alternatively,
 you might want to apply it to all web routes, in that case, you would 
 register this middleware in the web middleware group in app/Http/Kernel. 
 I usually don't want this to fire up on administrative routes though, so I 
 use this middleware only for publicly accessible pages. The routes then looks like this:
*/
//Route::name('front')->middleware('visitor')->group(function() {
Route::name('')->middleware('visitor')->group(function() {
   // Route::get('/', 'FrontpageController@index')->name('index');
   //add all your pages here such that we count their views
   Route::get('/', [PagesController::class, 'Index'])->name('Index');
   Route::get('/about', [PagesController::class, 'About'])->name('About');
   Route::get('/services', [PagesController::class, 'Services'])->name('Services');
   Route::get('/posts', [PostsController::class, 'index'])->name('Posts');
    
});

/*
//this route example with only slash indicates visiting index or landing page
// and you return the name of that page using view
//via browser, this is ccessed like http://mylaraveldemoapp.loc/
Route::get('/', function () {
    return view('welcome');//here you return your existing html page

    //return"Hello bruno, your about to master laravel";
});


//this route example with  /hello indicates visiting a page which we given a key name hello
// and you can either return the name of that page using view or return a string
//via browser, this is ccessed like http://mylaraveldemoapp.loc/hello
Route::get('/hello', function () {
return"<h1>Hello bruno, your about to master laravel</h1>";//returned a string
});

//this route example with  /users/{id} indicates  visiting a page which we given a key name users and
//pass aparameter name called id
// and you can either return the name of that page using view or return a string
//via browser, this is ccessed like http://mylaraveldemoapp.loc/users/6
Route::get('/users/{id}', function ($id) {
return"<h1>Hello bruno, this is your user id ".$id."</h1>";
});
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
