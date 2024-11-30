<?php
use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;
use Modules\Settings\Http\Controllers\PrivacySettingsController;
use Modules\Settings\Http\Controllers\NotificationSettingsController;

Route::middleware(['auth'])->prefix('settings')->name('settings.')->group(function () {
    // General Settings CRUD
    Route::resource('/', PrivacySettingsController::class)->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'show' => 'show',
        'edit' => 'edit',
        'update' => 'update',
        'destroy' => 'destroy',
    ]);

    // Privacy Settings Routes
    Route::get('/privacy', [PrivacySettingsController::class, 'index'])->name('privacy.index');
    Route::put('/privacy', [PrivacySettingsController::class, 'update'])->name('privacy.update');
    Route::get('/notifications', [NotificationSettingsController::class, 'edit'])->name('notifications.edit');
    Route::put('/notifications', [NotificationSettingsController::class, 'updateNotifications'])->name('notifications.update');
});

