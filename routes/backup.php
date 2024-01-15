<?php

use Illuminate\Support\Facades\Route;
//Frontend
use App\Http\Controllers\Frontend\PagesController;

//Backend
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BrandController;  
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;


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


//User Auth Pages
Route::get('/Userlogin',[PagesController::Class, 'Userlogin'])->name('Userlogin');
Route::get('/Customer_Dashboard',[PagesController::Class, 'Customer_Dashboard'])->name('Customer_Dashboard');


//Prodcuts Pages
Route::get('/products',[PagesController::Class, 'products'])->name('products');
Route::get('/product_details',[PagesController::Class, 'product_details'])->name('product_details');


//Cart & Checkout 
Route::get('/cart',[PagesController::Class, 'cart'])->name('cart');
Route::get('/checkout',[PagesController::Class, 'checkout'])->name('checkout');



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
Route::get('/dashboard',[DashboardController::Class,'index'])->name('admin.dashboard');



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


}); 


///
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
