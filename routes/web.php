<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\NotFoundController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Route::get('/products', function () {
//     return view('product');
// });

// Route::get('/products/{id?}/{name?}', function ($id=null, $name=null) {
//     return view('product')->with([
//         'productId' => $id,
//         'name' =>$name
//     ]);
// })->where(['id'=>'[0-9]*', 'name'=>'[a-zA-Z0-9 ]*']);

// Route::get('/products/{id?}/{name?}', function ($id=null, $name=null) {
//     return view('product',[
//         'productId' => $id,
//         'name' =>$name
//     ]);
// })->where(['id'=>'[0-9]*', 'name'=>'[a-zA-Z0-9 ]*']);

//  using compact
Route::get('/products/{id?}/{name?}', function ($id=null, $name=null) {
    return view('product',compact('id', 'name'));
})->where(['id'=>'[0-9]*', 'name'=>'[a-zA-Z0-9 ]*']);

Route::get('/service', function () {
    return view('service');
});

Route::get('/promotion', function () {
    return view('promotion');
});


Route::get('/', function () {
    return view('admin.layouts.master');
});


// Article Route
// Route::get('/articles/{id?}/{name?}', [ArticleController::class, 'index']);

// Route::get('/articles/create', [ArticleController::class, 'create']);

// Route::get('/articles/{id?}/edit', [ArticleController::class, 'edit']);

// Article Routes
Route::resource('admin/articles', ArticleController::class);

// Route::get('/admin/articles/create', function () {
//     return view('admin.articles.create');
// });

//
Route::post('/admin/articles/movealltotrash', [ArticleController::class, 'moveAllToTrash']);
Route::post('/admin/articles/putbackall', [ArticleController::class, 'putbackAll']);
Route::get('/admin/article/trash', [ArticleController::class, 'getArticleTrashed']);
Route::get('/admin/delarticle/deleteforever/{id}', [ArticleController::class, 'deleteForever']);




// Not allowed route
Route::view('admin/no-permission/', 'admin.no-permission');








// ----------------------------------------------------------------
// Employee routes
Route::resource('admin/employees', EmployeesController::class);

// ----------------------------------------------------------------
// Product routes
// Route::resource('/products', ProductController::class);



// Category routes
// Route::get('/admin/categories', function () {
//     return view('admin.categories.index');
// });


Route::resource('admin/categories', CategoryController::class);







// not found route
Route::any('{catchall}', [NotFoundController::class, 'notfound'])->where('catchall', '.*');
