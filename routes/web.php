<?php



use GuzzleHttp\Middleware;
use App\Models\subcategory;
use App\Http\Middleware\isSubs;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\roleController;
use App\Http\Controllers\backend\userController;
use App\Http\Controllers\backend\backendController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\backend\subcategoryController;
use App\Http\Controllers\backend\socaial_loginController;

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

//frontend route//
Route::get('/', [frontendController::class, 'index'])->name('frontend.home');
Route::get('/category_post/{category:slug}', [frontendController::class, 'frontend_post'])->name('frontend.post');
Route::get('/subcategory_post/{categories:slug}', [frontendController::class, 'frontend_sub_post'])->name('frontend.sub_post');
Route::get('/single_block/{category:slug}',[frontendController::class,'single_post'])->name('frontend.singlepost');
Route::get('/search',[frontendController::class,'search'])->name('frontend.search.post');
Route::get('/contact',[frontendController::class, 'contact'])->name('frontend.contact');
//END FRONTEND ROUTE//



//GOOGLE LGIN ROUTE//
Route::get('/google/login',[socaial_loginController::class, 'google_login'])->name('google.login');
Route::get('/google/redirect',[socaial_loginController::class, 'google_redirect'])->name('google.redirect');

//FACEBOOK LOGIN ROUTE//
Route::get('/facebook/login',[socaial_loginController::class, 'facebook_login'])->name('facebook.login');
Route::get('/facebook/redirect',[socaial_loginController::class, 'facebook_redirect'])->name('facebook.redirect');

//FACEBOOK LOGIN ROUTE//
Route::get('/github/login',[socaial_loginController::class, 'github_login'])->name('github.login');
Route::get('/github/redirect',[socaial_loginController::class, 'github_redirect'])->name('github.redirect');
   
//AUTH ROUTE//
Auth::routes();


//ALL BACKEND USER CAN ACCESS ROUTE BELOW, IF AUTH USERS//

Route::middleware('auth')->middleware('isBan')->middleware('isSubs')->group(function(){

//backend deshboard//
Route::get('/deshboard', [backendController::class, 'index'])->name('backend.home');


//Role Controller ROUTE GROUP//
Route::prefix('/role')->name('role.')->middleware('permission:role create|role edite|role status')->group(function(){
        
    Route::get('add',[roleController::class,'roleadd'])->name('add');
    Route::post('store',[roleController::class,'store'])->name('store');
    Route::get('edit/{id}',[roleController::class,'edit'])->name('edit')->middleware('permission:role edite');
    Route::put('update/{id}',[roleController::class,'update'])->name('update');



});


//USER ROUTE ROUTE GROUP//

    Route::prefix('user')->name('user.')->middleware(['permission:user ban|user edite|user create'])->group(function(){

        Route::get('/add',[userController::class, 'usercreate'])->name('add');
        Route::post('/store',[userController::class, 'userstore'])->name('store')->middleware('permission:user create');
        Route::get('/edit/{id}',[userController::class, 'useredite'])->name('edite')->middleware('permission:user edite');
        Route::put('/rolesupdate/{id}',[userController::class, 'rolesupdate'])->name('rolesupdate');
        Route::get('/userupdate/{id}',[userController::class, 'userupdate'])->name('userupdate')->middleware('permission:user edite');
        Route::get('/userupdate/{id}',[userController::class, 'userupdate'])->name('userupdate');
        Route::post('/updatestore/{id}',[userController::class, 'updatestore'])->name('updatestore');
        Route::get('/ban/{id}',[userController::class, 'ban'])->name('ban')->middleware('permission:user ban');;

});



    /*Category Route GROUP */

    Route::prefix('/category')->name('category.')->middleware('permission:category delete|category edite|category create')->group(function () {

    Route::get('/add', [CategoryController::class, 'addcategory'])->name('add');
    Route::post('/store', [CategoryController::class, 'storecategory'])->name('store');
    Route::get('/edite/{category:slug}', [CategoryController::class, 'editcategory'])->name('edit')->middleware('permission:category edite');
    Route::put('/update/{category:slug}', [CategoryController::class, 'updatecategory'])->name('update');
    Route::delete('/delete/{category:slug}', [CategoryController::class, 'deletecategory'])->name('delete')->middleware('permission:category delete');


    //CATEGORY WITH SubCategory Route GROUP//

    Route::prefix('/subcategory')->name('sub.')->group(function () {

        Route::get('/add',[subcategoryController::class,'add_sub_category'])->name('add');
        Route::post('/store',[subcategoryController::class,'store_sub_category'])->name('store');
        Route::get('/edit/{categories:slug}',[subcategoryController::class,'edit_sub_category'])->name('edit');
        Route::put('/update/{categories:slug}', [subcategoryController::class, 'update_sub_category'])->name('update');
        Route::delete('/delete/{categories:slug}',[subcategoryController::class,'delete_sub_category'])->name('delete')->middleware('permission:category delete');


});


});


 //POST ROUTE GROUP//

    Route::prefix('/post')->name('post.')->middleware('permission:post delete|post edite|post create')->group(function(){

        Route::get('/add',[PostController::class,'addpost'])->name('add');
        Route::post('/add',[PostController::class,'storepost'])->name('store');
        Route::get('/allpost',[PostController::class,'allpost'])->name('allpost');
        Route::get('/edit/{category:slug}',[PostController::class,'edit'])->name('edit')->middleware('permission:post edite');
        Route::post('/update/{category:slug}',[PostController::class,'update'])->name('update')->middleware('permission:post edite');
        Route::delete('/delete/{category:slug}',[PostController::class,'delete'])->name('delete')->middleware('permission:post delete');
      


});

});


