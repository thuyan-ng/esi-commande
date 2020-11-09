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

Route::get('/', function () {
    return view('index');
});

Route::get('/addStudent', function() {
    return view('addStudent');
});

Route::get('/connexion', function() {
    return view('connexion');
});

Route::get('/produits', function() {
    return view('produits');
});

Route::get('/order', function(){
    return view('order');
});

Route::get('/updateProduct/{productId}',"ProductCtrl@showProduct");
Route::post('/updateProduct/{productId}',"ProductCtrl@update");

Route::delete('/deleteProduct/{productId}', "ProductCtrl@delete");



Route::get('/addProduct', function(){
    return view("addProduct");
});

Route::get('/groups', 'GroupCtrl@showAll');

Route::post('/addProduct', "ProductCtrl@insert");
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('api/produits', 'ProductCtrl@showAll');
Route::post('api/addStudent', 'StudentCtrl@insert');
Route::get('api/students', 'StudentCtrl@listAll');
Route::get('api/students/{id}', 'StudentCtrl@exist');
Route::get('groups/show', 'GroupCtrl@show');

/*
|--------------------------------------------------------------------------
| Order Routes
|--------------------------------------------------------------------------
*/
Route::post("/addOrder", "OrderCtrl@addOrder");
Route::get("/api/order", "OrderCtrl@showOrder");
Route::delete("api/order/{id}", "OrderCtrl@delete");
Route::post("/api/order/create","OrderCtrl@create");

/*
|--------------------------------------------------------------------------
| Session Routes
|--------------------------------------------------------------------------
*/
Route::post("/connexion/login", "SessionCtrl@login");
Route::get("/deconnexion", "SessionCtrl@logout");


/*
|--------------------------------------------------------------------------
| Categories Routes
|--------------------------------------------------------------------------
*/
Route::get("/api/categories", "CategorieCtrl@showAll");
Route::get("/categories", function(){
    return view("categories");
});
Route::get("/api/categories/{id}", "ProductCtrl@apiShowAllProductsInCategorie");
Route::get("/showProductsInCategorie/{id}", "ProductCtrl@showAllProductsInCategorie");

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/
Route::get("/api/groups", "GroupCtrl@showAll");