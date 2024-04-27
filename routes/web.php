<?php

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
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

Route::get('/', function () {

    $posts=Post::all();

    return view('posts',compact('posts'));
});

//Route::get('/posts/{post}',function ($slug){
//
//    $path=__DIR__."/../resources/posts/{$slug}.html";
//    if(!file_exists($path))
//    {
//        return redirect('/');
//    }
//    $post= Cache::remember("posts.{$slug}",now()->addSeconds(60),fn()=>file_get_contents($path));
//    return view('post',compact('post'));
//
//})->where('post','[A-Z_\_]+');


Route::get('/posts/{post}',function ($slug){
    $post= Post::findOrfail($slug);
    return view('post',compact('post'));

});
