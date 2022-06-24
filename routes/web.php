<?php

use App\Http\Controllers\Admin\IndexController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

// Главная страница (пока редиректим на удобрения)
Route::get('/', function () {
    return  redirect()->route('fertilizer.index');
});
// Роуты авторизации
Auth::routes();

Route::get('/home',  function () {
    return  redirect()->route('admin.index');
});

// Каталог удобрений
Route::group(['namespace' => 'Fertilizer', 'prefix' => 'fertilizers'], function () {
    Route::get('/', 'IndexController')->name('fertilizer.index');
    Route::get('/{fertilizer}', 'ShowController')->name('fertilizer.show');
});

// РОУТЫ АДМИНКИ
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    // Главная страница
    Route::get('/', 'IndexController')->name('admin.index');

    // Клиенты
    Route::group(['namespace' => 'Client', 'prefix' => 'clients'], function () {

        // CRUD клиентов
        Route::get('/', 'IndexController')->name('admin.client.index');
        Route::get('/create', 'CreateController')->name('admin.client.create');
        Route::post('/', 'StoreController')->name('admin.client.store');
        Route::get('/{client}', 'ShowController')->where('client', '[0-9]+')->name('admin.client.show');
        Route::get('/{client}/edit', 'EditController')->where('client', '[0-9]+')->name('admin.client.edit');
        Route::patch('/{client}', 'UpdateController')->where('client', '[0-9]+')->name('admin.client.update');
        Route::delete('/{client}', 'DeleteController')->where('client', '[0-9]+')->name('admin.client.delete');

        // Роуты корзины клиентов
        Route::group(['namespace' => 'Trash', 'prefix' => 'trash'], function () {
            Route::get('/', 'IndexController')->name('admin.client.trash.index');
            Route::patch('/{id}', 'UpdateController')->where('id', '[0-9]+')->name('admin.client.trash.update');
        });
    });

    // Группы культур
    Route::group(['namespace' => 'Culture', 'prefix' => 'cultures'], function () {
        Route::get('/', 'IndexController')->name('admin.culture.index');
        Route::get('/create', 'CreateController')->name('admin.culture.create');
        Route::post('/', 'StoreController')->name('admin.culture.store');
        Route::get('/{culture}', 'ShowController')->where('culture', '[0-9]+')->name('admin.culture.show');
        Route::get('/{culture}/edit', 'EditController')->where('culture', '[0-9]+')->name('admin.culture.edit');
        Route::patch('/{culture}', 'UpdateController')->where('culture', '[0-9]+')->name('admin.culture.update');
        Route::delete('/{culture}', 'DeleteController')->where('culture', '[0-9]+')->name('admin.culture.delete');

        // Роуты корзины культур
        Route::group(['namespace' => 'Trash', 'prefix' => 'trash'], function () {
            Route::get('/', 'IndexController')->name('admin.culture.trash.index');
            Route::patch('/{culture}', 'UpdateController')->where('culture', '[0-9]+')->name('admin.culture.trash.update');
        });
    });

    // Удобрения
    Route::group(['namespace' => 'Fertilizer', 'prefix' => 'fertilizers'], function () {
        Route::get('/', 'IndexController')->name('admin.fertilizer.index');
        Route::get('/create', 'CreateController')->name('admin.fertilizer.create');
        Route::post('/', 'StoreController')->name('admin.fertilizer.store');
        Route::get('/{fertilizer}', 'ShowController')->where('fertilizer', '[0-9]+')->name('admin.fertilizer.show');
        Route::get('/{fertilizer}/edit', 'EditController')->where('fertilizer', '[0-9]+')->name('admin.fertilizer.edit');
        Route::patch('/{fertilizer}', 'UpdateController')->where('fertilizer', '[0-9]+')->name('admin.fertilizer.update');
        Route::delete('/{fertilizer}', 'DeleteController')->where('fertilizer', '[0-9]+')->name('admin.fertilizer.delete');

        // Роуты корзины удобрений
        Route::group(['namespace' => 'Trash', 'prefix' => 'trash'], function () {
            Route::get('/', 'IndexController')->name('admin.fertilizer.trash.index');
            Route::patch('/{fertilizer}', 'UpdateController')->where('fertilizer', '[0-9]+')->name('admin.fertilizer.trash.update');
        });
    });

    // Пользователи
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->where('user', '[0-9]+')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->where('user', '[0-9]+')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->where('user', '[0-9]+')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->where('user', '[0-9]+')->name('admin.user.delete');

        // Роуты корзины пользователей
        Route::group(['namespace' => 'Trash', 'prefix' => 'trash'], function () {
            Route::get('/', 'IndexController')->name('admin.user.trash.index');
            Route::patch('/{user}', 'UpdateController')->where('user', '[0-9]+')->name('admin.user.trash.update');
        });
    });
});
