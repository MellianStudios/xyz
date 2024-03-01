<?php

use App\Http\Controllers\Admin\DownloadMediaController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->as('admin.')->group(function () {
    Route::resource('/users', UserController::class)
        ->except(['show', 'destroy']);

    Route::get('/download-media/{user}', DownloadMediaController::class)
        ->name('download_media');
});

