<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Category\CategoryController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/search', [App\Http\Controllers\SearchController::class, 'query'])->name('search.query');

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    Route::get('/', [App\Http\Controllers\Post\PostController::class, 'index'])->name('post.index');
    Route::get('/{post:slug}', [App\Http\Controllers\Post\PostController::class, 'show'])->name('post.show');

});


Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{gallery}', [App\Http\Controllers\GalleryController::class, 'show'])->name('gallery.show');


// Route::group(['namespace' => 'App\Http\Controllers\Rate', 'prefix' => 'rate'], function () {
//     Route::get('/create', [App\Http\Controllers\RateController::class, 'store'])->name('rate.create');
//     Route::get('/update', [App\Http\Controllers\RateController::class, 'update'])->name('rate.update');

// });





Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/', [AdminMainController::class, 'index'])->name('admin.index');

    Route::get('/search', [App\Http\Controllers\Admin\SearchController::class, 'query'])->name('admin.search.query');


    Route::group(['namespace' => 'Rate', 'prefix' => 'rate'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Rate\RateController::class, 'index'])->name('admin.rate.index');
        Route::get('/create', [App\Http\Controllers\Admin\Rate\RateController::class, 'create'])->name('admin.rate.create');
        Route::post('/', [App\Http\Controllers\Admin\Rate\RateController::class, 'store'])->name('admin.rate.store');
        Route::get('/edit/{rate}', [App\Http\Controllers\Admin\Rate\RateController::class, 'edit'])->name('admin.rate.edit');
        Route::patch('/{rate}', [App\Http\Controllers\Admin\Rate\RateController::class, 'update'])->name('admin.rate.update');
        Route::delete('/{rate}', [App\Http\Controllers\Admin\Rate\RateController::class, 'destroy'])->name('admin.rate.destroy');

        Route::get('/rates-update', [App\Http\Controllers\Admin\Rate\RateController::class, 'updateRateData'])->name('admin.rate.updateRateData');
    });

    Route::group(['namespace' => 'Album', 'prefix' => 'album'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Album\AlbumController::class, 'index'])->name('admin.album.index');
        Route::get('/create', [App\Http\Controllers\Admin\Album\AlbumController::class, 'create'])->name('admin.album.create');
        Route::post('/', [App\Http\Controllers\Admin\Album\AlbumController::class, 'store'])->name('admin.album.store');
        Route::get('/edit/{album}', [App\Http\Controllers\Admin\Album\AlbumController::class, 'edit'])->name('admin.album.edit');
        Route::patch('/{album}', [App\Http\Controllers\Admin\Album\AlbumController::class, 'update'])->name('admin.album.update');
        Route::delete('/{album}', [App\Http\Controllers\Admin\Album\AlbumController::class, 'destroy'])->name('admin.album.destroy');
    });


    Route::group(['namespace' => 'Gallery', 'prefix' => 'galleries'], function () {
        Route::get('/', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'index'])->name('admin.gallery.index');
        Route::get('/create', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'create'])->name('admin.gallery.create');
        Route::post('/', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'store'])->name('admin.gallery.store');
        Route::get('/edit/{gallery}', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'edit'])->name('admin.gallery.edit');
        Route::patch('/{gallery}', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'update'])->name('admin.gallery.update');
        Route::delete('/{gallery}', [App\Http\Controllers\Admin\Gallery\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    });



    Route::group(['namespace' => 'Rate', 'prefix' => 'rates'], function () {
        Route::get('/create', [App\Http\Controllers\Admin\Rate\CreateUpdateRateController::class, 'store'])->name('admin.rates.create');
        Route::get('/update', [App\Http\Controllers\Admin\Rate\CreateUpdateRateController::class, 'update'])->name('admin.rates.update');
    });


    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/{post}', [PostController::class, 'show'])->name('admin.post.show');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::patch('/{post}', [PostController::class, 'update'])->name('admin.post.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('admin.post.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', [TagController::class, 'index'])->name('admin.tag.index');
        Route::get('/create', [TagController::class, 'create'])->name('admin.tag.create');
        Route::post('/', [TagController::class, 'store'])->name('admin.tag.store');
        Route::get('/{tag}', [TagController::class, 'show'])->name('admin.tag.show');
        Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('admin.tag.edit');
        Route::patch('/{tag}', [TagController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{tag}', [TagController::class, 'delete'])->name('admin.tag.delete');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
