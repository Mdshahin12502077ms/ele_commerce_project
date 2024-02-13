<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\HomeController;
use App\http\Controllers\AdminController;
use Illuminate\Support\Facades\Notification;
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



route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/send',[AdminController::class,'sendnotification']);
//start admin
route::get('/view_category',[AdminController::class,'view_category']);
route::post('/add_category',[AdminController::class,'add_category']);
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
// product route
route::get('/view_product',[AdminController::class,'view_product']);
route::post('/Add_Product',[AdminController::class,'Add_Product']);
route::get('/show_product',[AdminController::class,'show_product']);
route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
route::get('/Edit_product/{id}',[AdminController::class,'Edit_product']);
route::post('/Update_product_confirm/{id}',[AdminController::class,'Update_product_confirm']);

//order route

route::get('/Order',[AdminController::class,'Order']);
route::get('/Delivered/{id}',[AdminController::class,'Delivered']);
//cancel order

route::get('/cancel_order/{id}',[AdminController::class,'cancel_order']);

//print
route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

//send email
//verify email
route::get('/send_email/{id}',[AdminController::class,'send_email']);
//user email send
route::post('/send_user_email/{Email}',[AdminController::class,'send_user_email']);


//search order
route::get('/search',[AdminController::class,'search']);

//messege_client
route::get('/messege_showing',[AdminController::class,'messege_showing']);
//Customer review
route::get('/Show_Customer_Comment',[AdminController::class,'Show_Customer_Comment']);
//Customer reply
route::get('/Reply_comment/{id}',[AdminController::class,'Reply_comment']);
route::post('/Customer_add_reply/{id}',[AdminController::class,'Customer_add_reply']);


//home controller
route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
route::get('/Product',[HomeController::class,'Product']);
route::get('/Product_details/{id}',[HomeController::class,'Product_details']);
//cart route
route::post('/Add_cart/{id}',[HomeController::class,'Add_cart']);
route::get('/show_cart',[HomeController::class,'show_cart']);
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
route::get('/load-cart-data',[HomeController::class,'cart_count']);
//show_order

route::get('/show_order',[HomeController::class,'show_order']);
//cancel order

route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);


//delivary & payment method
route::get('/Cash_Order',[HomeController::class,'Cash_Order']);
route::get('/stripe/{total_price}',[HomeController::class,'stripe']);
//stripe part
Route::post('stripe/{total_price}',[HomeController::class, 'stripePost'])->name('stripe.post');
//comment part
route::post('/add_comment',[HomeController::class,'add_comment']);
route::post('/add_reply',[HomeController::class,'add_reply']);
//product search
route::get('/product_search',[HomeController::class,'product_search']);
route::get('/product_search_product',[HomeController::class,'product_search_product']);
// subscribe mail
route::post('/subscribe',[HomeController::class,'subscribe_mail']);
//CONTACT
route::get('/contacts',[HomeController::class,'contacts']);
route::post('/contact',[HomeController::class,'contact_client']);
//rating
route::post('/add_rating/{id}',[HomeController::class,'add_rating']);
// customer comment
route::post('/Customer_Comment/{id}',[HomeController::class,'Customer_Comment']);
// customer reply
route::post('/Customer_add_reply/{id}',[HomeController::class,'Customer_add_reply']);