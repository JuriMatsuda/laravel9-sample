<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/events', [EventController::class, 'index']);

//練習コード TweetController_sampleで操作します
Route::get('/tweets_sample', [\App\Http\Controllers\TweetController_sample::class, 'index'])->name('tweet.index');
Route::post('/tweets_sample', [\App\Http\Controllers\TweetController_sample::class, 'store'])->name('tweet.store');
Route::get('/tweets_smple/{tweetId}/edit', [\App\Http\Controllers\TweetController_sample::class, 'edit'])->name('tweet.edit');
Route::put('/tweets_sample/{tweetId}', [\App\Http\Controllers\TweetController_sample::class, 'update'])->name('tweet.update');
Route::delete('/tweets_sample/{tweetId}', [\App\Http\Controllers\TweetController_sample::class, 'destroy'])->name('tweet.destroy');


require __DIR__.'/auth.php';
