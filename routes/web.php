<?php

use App\Events\GeneralNotificationsEvent;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// define('INVOICES_COUNT', 5);
// Route::get('/test-event', function () {
//     event(new GeneralNotificationsEvent([
//         'username' => '$authUser->names',
//         'post_id' => '$comment->post_ids',
//         'comment' => '$comment->contents'
//     ]));
// });
Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function(){

    Route::controller(AdminController::class)->group(function(){
        Route::get('/home', 'home')->name('home');
        Route::get('locale/{locale}', 'langouage')->name('locale');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('/get-clients', 'index')->name('get-clients');
        Route::get('/user-destroy/{id}', 'destroy')->name('user.destroy');
    });

    Route::controller(InvoiceController::class)->group(function(){
        Route::get('/invoices', 'index')->name('all-invoices');
        Route::get('/invoices/{status}', 'invoicesStatus')->name('invoices-status');
        Route::get('/invoice/{invoice_num}', 'show')->name('invoice.show');
        Route::get('/invoice-destroy/{id}', 'destroy')->name('invoice.destroy');
    });
    
    Route::controller(ChatController::class)->group(function(){
        Route::get('/get-chats', 'index');
        Route::get('/get-messages/{chatId}', 'messages');
    });

    Route::controller(PostController::class)->group(function(){
        Route::get('/posts', 'index')->name('posts');
        Route::get('/check-new-comments', 'checkNewComments')->name('checkNewComments');
    });
});





// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
