<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\AllPosts;
use App\Livewire\DeletePost;
use App\Livewire\Home;
use App\Livewire\NewPost;
use App\Livewire\Posts;
use App\Livewire\ViewPost;
use Illuminate\Routing\RouteGroup;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',AllPosts::class )->name('home');
Route::group(['middleware'=>'isUser'],function(){
Route::get('/NewPost',NewPost::class )->name('newpost');
Route::get('/Posts',Posts::class )->name('posts');
Route::get('/viewpost/{id}',ViewPost::class )->name('viewpost');
// Route::get('/deletepost/{id}',DeletePost::class )->name('deletepost');

});
Route::group(['prefix'=>'admin','middleware'=>'isAdmin'],function(){
Route::get('dashboard',Dashboard::class );

});
