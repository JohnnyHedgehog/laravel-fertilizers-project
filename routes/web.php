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

        // Роуты импорта клиентов через Excel
        Route::group(['namespace' => 'Import', 'prefix' => 'import'], function () {
            Route::get('/', 'CreateController')->name('admin.client.import.create');
            Route::post('/', 'StoreController')->name('admin.client.import.store');
            Route::get('/loading', 'LoadingController')->name('admin.client.import.loading');
        });

        // Роут экспорта клиентов через Excel и Word
        Route::group(['namespace' => 'Export', 'prefix' => 'export'], function () {
            Route::get('/', 'IndexController')->name('admin.client.export.index');
        });

        // Роуты выгрузки документов клиентов через Word
        Route::group(['namespace' => 'WordExport', 'prefix' => 'word-export'], function () {
            Route::get('/{client}', 'IndexController')->where('client', '[0-9]+')->name('admin.client.word-export.index');
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

        // Роуты импорта удобрений через Excel
        Route::group(['namespace' => 'Import', 'prefix' => 'import'], function () {
            Route::get('/', 'CreateController')->name('admin.fertilizer.import.create');
            Route::post('/', 'StoreController')->name('admin.fertilizer.import.store');

            Route::get('/loading', 'LoadingController')->name('admin.fertilizer.import.loading');
        });

        // Роут экспорта удобрений через Excel
        Route::group(['namespace' => 'Export', 'prefix' => 'export'], function () {
            Route::get('/', 'IndexController')->name('admin.fertilizer.export.index');
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

    // Импорт Excel
    Route::group(['namespace' => 'ExcelImport', 'prefix' => 'excel-imports'], function () {
        Route::get('/', 'IndexController')->name('admin.excel-import.index');
    });
});
