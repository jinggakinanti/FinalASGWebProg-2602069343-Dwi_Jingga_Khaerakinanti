<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FriendController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware' => 'CheckPaid'])->prefix('/connectfriend')->group(function(){
    Route::get('/profile', [UserController::class,'profile'])->name('profile.page');
    Route::post('/profile/upload', [UserController::class,'upload_image'])->name('upload_image');

    Route::get('/detail/{id}', [HomeController::class,'detail'])->name('detail.page');

    Route::get('/myfriends', [FriendController::class,'my_friends'])->name('my_list.page');
    Route::get('/friends/{id}', [FriendController::class,'friend_list'])->name('list.page');
    Route::post('/removefriend/{id}', [FriendController::class, 'remove'])->name('remove_friend');

    Route::get('/sendrequest/{id}', [FriendController::class,'request'])->name('request_friend');

    Route::get('/notification', [UserController::class,'notification'])->name('notification.page');
    Route::post('/notification/{id}', [UserController::class,'read'])->name('read_notif');

    Route::get('/chat/{id}', [FriendController::class,'chat'])->name('chat.page');
    Route::get('/chat', [FriendController::class,'chat_list'])->name('chat_list.page');
    Route::post('chat/{id}/send', [FriendController::class, 'send_chat'])->name('send_chat');

    Route::get('/settings', [HomeController::class,'settings'])->name('settings.page');
    Route::post('/topup', [TransactionController::class, 'topup'])->name('topup');
    Route::post('/visible', [UserController::class, 'visibility'])->name('change_visible');

    Route::get('/avatar', [TransactionController::class,'avatar'])->name('avatar.page');
    Route::post('/buyavatar/{id}', [TransactionController::class, 'buy_avatar'])->name('buy_avatar');
    Route::post('/setavatar/{id}', [TransactionController::class, 'set_avatar'])->name('set_avatar');
    Route::post('/disavatar/{id}', [TransactionController::class, 'remove_avatar'])->name('dis_avatar');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/payment', [TransactionController::class,'registered'])->name('register_payment.page');
    Route::post('/payment', [TransactionController::class,'pay_fee'])->name('fee_process');
    Route::post('/payment/convert', [TransactionController::class,'convert'])->name('convert');
});

Route::prefix('/connectfriend')->group(function(){
    Route::get('/home', [HomeController::class,'view'])->name('home.page');

    Route::get('/search', [HomeController::class,'search'])->name('search.page');
    Route::get('/home/filter', [HomeController::class, 'filter'])->name('home_filter.page');

});

Auth::routes();

Route::post('logout', function () {
    Auth::logout();
    return redirect('/connectfriend/home'); 
})->name('logout');

Route::get('/set-locale/{locale}', function($locale){
    if(in_array($locale, ['en','id'])){
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('set-locale');
