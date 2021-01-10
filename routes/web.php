<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Role;
use App\Photo;
use Carbon\Carbon;
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
    return view('layouts.app');
});

Route::middleware(['web'])->group(function () {
    Route::resource('posts', 'PostController');


    Route::get('/dates', function () {
        $date = new DateTime('+1 week');

        echo $date->format('m-d-Y') . '<br/>';

        echo Carbon::now()->addDays(30)->diffForHumans();
    });
});


// |--------------------------------------------------------------------------
// | DB
// |--------------------------------------------------------------------------
// |

Route::get('/create-role-user', function () {
    DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [1, 1]);
    DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [2, 2]);
});



// |--------------------------------------------------------------------------
// | ELOQUENT
// |--------------------------------------------------------------------------
// |


// |POST==============================================================================================
Route::get('/create-post', function () {
    for ($x = 1; $x <= 10; $x++) {
        Post::create(['title' => 'product ' . $x, 'content' => 'content ' . $x]);
    }
});

Route::get('/softdelete-post', function () {
    for ($x = 1; $x <= 10; $x++) {
        Post::destroy($x);
    }
});

Route::get('/restore-post', function () {
    for ($x = 1; $x <= 10; $x++) {
        Post::withTrashed()
            ->where('id', $x)
            ->restore();
    }
});

Route::get('/post/{id}/user', function ($id) {
    return Post::find($id)->user->name;
});

Route::get('/post/{id}/photo', function ($id) {

    foreach (Post::find($id)->photos as $photo) {
        echo $photo->path . "<br/>";
    }
});

// |USER==============================================================================================
Route::get('/create-user', function () {
    User::create(['name' => 'user1', 'email' => 'user1@gmail.com', 'password' => '123456789']);
});


Route::get('/user/{id}/post', function ($id) {
    return User::find($id)->post->title;
});


Route::get('/user/{id}/posts', function ($id) {

    foreach (User::find($id)->posts as $post) {
        echo $post->title . "<br/>";
    }
});

Route::get('/user/{id}/roles', function ($id) {

    foreach (User::find($id)->roles as $role) {
        echo $role->created_at . "<br/>";
    }
});

Route::get('/user/photos', function () {

    foreach (User::find(1)->photos as $photo) {
        // echo $photo->path . "<br/>";
        dd($photo);
    }
});
// |ROLE==============================================================================================

Route::get('/create-role', function () {
    for ($x = 1; $x <= 3; $x++) {
        Role::create([
            'name' => 'role' . $x,
        ]);
    };
});


// |PHOTO==============================================================================================
Route::get('/create-photo', function () {
    for ($x = 1; $x <= 3; $x++) {
        Photo::create([
            'path' => 'image' . $x,
            'imageable_id' => 1,
            'imageable_type' => 'App\\User'
        ]);
    };

    for ($x = 4; $x <= 7; $x++) {
        Photo::create([
            'path' => 'image' . $x,
            'imageable_id' => 4,
            'imageable_type' => 'App\\Post'
        ]);
    };
});

Route::get('/photo/{id}', function ($id) {
    echo Photo::findOrFail($id)->imageable;
});