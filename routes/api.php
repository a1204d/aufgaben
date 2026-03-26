<?php

use App\Http\Controllers\AreaController;
use Illuminate\Support\Facades\Route;

Route::prefix('responder')->group(function () {

    Route::get('/hi', function () {
        return 'Hallo Welt';
    });

    Route::get('/number', function () {
        return rand(1, 10);
    });

    Route::get('/www', function () {
        return redirect('https://www.ict-bz.ch');
    });

    Route::get('/favi', function () {
        return response()->download(public_path('favicon.ico'));
    });

    Route::get('/hi/{name}', function ($name) {
        return "Hi $name";
    });

    Route::get('/weather', function () {
        return [
            'city' => 'Luzern',
            'temperature' => 20,
            'wind' => 10,
            'rain' => 0,
        ];
    });

    Route::get('/error', function () {
        return response()->json(['error' => 'Nicht authorisiert!'], 401);
    });

    Route::get('/multiply/{number1}/{number2}', function ($number1, $number2) {
        return $number1 * $number2;
    })->where([
        'number1' => '[0-9]+',
        'number2' => '[0-9]+',
    ]);

});

// Hallo Velo Endpunkte
Route::prefix('hallo-velo')->group(function () {

    Route::get('/bikes', function () {
        return \App\Models\Bike::get();
    });

    Route::get('/bike/{id}', function (int $id) {
        return \App\Models\Bike::find($id);
    });
});

// Bookler Endpunkte
Route::prefix('bookler')->controller(\App\Http\Controllers\BookController::class)->group(function () {
        // Bücher
        Route::get('/books', 'index');
        Route::get('/books/{id}', 'show');

        // Buch-Finder
        Route::prefix('book-finder')->group(function () {
            Route::get('/slug/{slug}', 'findBySlug');
            Route::get('/year/{year}','findByYear');
            Route::get('/max-pages/{pages}', 'findByMaxPages');
            Route::get('/search/{search}', 'search');
        });

        // Meta
        Route::prefix('meta')->group(function () {
            Route::get('/count', 'count');
            Route::get('/avg-pages', 'avgPages');
        });

        // Dashboard
        Route::get('/dashboard', 'dashboard');
});

Route::prefix('/relationsheep')->group(function () {
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);
    Route::controller(\App\Http\Controllers\TopicController::class)->group(function () {
        Route::get('/topics/{slug}/posts', 'posts')->where('slug', '[a-z0-9-]+');
        Route::get('/topics', 'index');
    });
});

Route::prefix('/ackerer')->group(function () {
    Route::controller(\App\Http\Controllers\PlantController::class)->group(function () {
        Route::get('/plants', 'index');
        Route::get('/plants/{id}', 'show');
    });
    Route::controller(AreaController::class)->group(function () {
        Route::get('/areas', 'index');
    });
});
