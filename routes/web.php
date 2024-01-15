<?php


use Illuminate\Support\Facades\Route;
//Frontend
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\SslCommerzPaymentController;
//Backend
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BrandController;  
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\OrderManagementController;


/*
|--------------------------------------------------------------------------
| Frontend Routes

|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[PagesController::Class, 'index'])->name('homepage');
Route::get('/about',[PagesController::Class, 'about'])->name('about');
Route::get('/contact',[PagesController::Class, 'contact'])->name('contact');
Route::post('/contactMail',[PagesController::Class, 'contactMail'])->name('contactMail');



//User Auth Pages
Route::get('/Userlogin',[PagesController::Class, 'Userlogin'])->name('userlogin');
Route::get('/Customer_Dashboard',[CustomerController::Class, 'index'])->name('Customer_Dashboard');
Route::post('/Customer_Dashboard/update/{id}',[CustomerController::Class, 'update'])->name('Customer_Dashboard.Update'); 
Route::post('/Customer_Dashboard/update/password/{id}',[CustomerController::Class, 'password_update'])->name('Customer_Dashboard.password.update'); 

//Prodcuts Pages
Route::get('/all-products',[PagesController::Class, 'products'])->name('products');
Route::get('/product-details/{slug}',[PagesController::Class, 'product_details'])->name('product-details');


//Cart 
Route::group(['prefix'=>'/cart'],function(){
  Route::get('/',[CartController::Class, 'index'])->name('cart.manage');
  Route::post('/store',[CartController::Class, 'store'])->name('cart.store'); 
  Route::post('/update/{id}',[CartController::Class, 'update'])->name('cart.update');
  Route::post('/delete/{id}',[CartController::Class, 'destroy'])->name('cart.delete');
});





//Checkout 
Route::get('/checkout',[PagesController::Class, 'checkout'])->name('checkout');

// SSLCOMMERZ Start
Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('makePayment');

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END




/*
|--------------------------------------------------------------------------
|  Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'admin'],function(){
Route::get('/dashboard',[DashboardController::Class,'index'])->middleware(['auth','verified','isAdmin'])->name('admin.dashboard');



          //Brand Group
            Route::group(['prefix'=>'/brand'],function(){
            Route::get('/manage',[BrandController::Class,'index'])->name('brand.manage');
            Route::get('/trash',[BrandController::Class,'trash'])->name('brand.trash');
            Route::get('/add',[BrandController::Class,'create'])->name('brand.create');
            Route::post('/store',[BrandController::Class,'store'])->name('brand.store');
            Route::get('/edit/{id}',[BrandController::Class,'edit'])->name('brand.edit');
            Route::post('/udate/{id}',[BrandController::Class,'update'])->name('brand.update');
            Route::post('/destroy/{id}',[BrandController::Class,'destroy'])->name('brand.destroy');
            });





        //Category Group
            Route::group(['prefix'=>'/category'],function(){
            Route::get('/manage',[CategoryController::Class,'index'])->name('category.manage');
            Route::get('/trash',[CategoryController::Class,'trash'])->name('category.trash');
            Route::get('/add',[CategoryController::Class,'create'])->name('category.create');
            Route::post('/store',[CategoryController::Class,'store'])->name('category.store');
            Route::get('/edit{id}',[CategoryController::Class,'edit'])->name('category.edit');
            Route::post('/udate{id}',[CategoryController::Class,'update'])->name('category.update');
            Route::post('/destroy{id}',[CategoryController::Class,'destroy'])->name('category.destroy');
            });

        //Product Group

         Route::group(['prefix'=>'/product'],function(){
          Route::get('/manage',[ProductController::Class,'index'])->name('product.manage');
          Route::get('/trash',[ProductController::Class,'trash'])->name('product.trash');
          Route::get('/add',[ProductController::Class,'create'])->name('product.create');
          Route::post('/store',[ProductController::Class,'store'])->name('product.store');
          Route::get('/edit/{id}',[ProductController::Class,'edit'])->name('product.edit');
          Route::post('/udate{id}',[ProductController::Class,'update'])->name('product.update');
          Route::post('/destroy{id}',[ProductController::Class,'destroy'])->name('product.destroy');
          });



        //Division Group
        Route::group(['prefix'=>'/division'],function(){
          Route::get('/manage',[DivisionController::Class,'index'])->name('division.manage');
          Route::get('/trash',[DivisionController::Class,'trash'])->name('division.trash');
          Route::get('/add',[DivisionController::Class,'create'])->name('division.create');
          Route::post('/store',[DivisionController::Class,'store'])->name('division.store');
          Route::get('/edit/{id}',[DivisionController::Class,'edit'])->name('division.edit');
          Route::post('/udate/{id}',[DivisionController::Class,'update'])->name('division.update');
          Route::post('/destroy/{id}',[DivisionController::Class,'destroy'])->name('division.destroy');
          });

          //District Group
          Route::group(['prefix'=>'/district'],function(){
            Route::get('/manage',[DistrictController::Class,'index'])->name('district.manage');
            Route::get('/trash',[DistrictController::Class,'trash'])->name('district.trash');
            Route::get('/add',[DistrictController::Class,'create'])->name('district.create');
            Route::post('/store',[DistrictController::Class,'store'])->name('district.store');
            Route::get('/edit/{id}',[DistrictController::Class,'edit'])->name('district.edit'); 
            Route::post('/udate/{id}',[DistrictController::Class,'update'])->name('district.update');
            Route::post('/destroy/{id}',[DistrictController::Class,'destroy'])->name('district.destroy');
            });

          //Order Group
          Route::group(['prefix'=>'/Order_Management'],function(){
            Route::get('/manage',[OrderManagementController::Class,'index'])->name('order.manage');
            Route::get('/edit/{id}',[OrderManagementController::Class,'edit'])->name('order.edit');
            Route::get('/details/{id}',[OrderManagementController::Class,'show'])->name('order.show');
            Route::post('/update/{id}',[OrderManagementController::Class,'update'])->name('order.update');

          });

         

}); 
require __DIR__.'/auth.php';
