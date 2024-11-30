<?php
use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;
use Modules\Settings\Http\Controllers\PrivacySettingsController;
use Modules\Settings\Http\Controllers\NotificationSettingsController;
use Modules\Settings\Http\Controllers\ContentSettingController;
use Modules\Settings\Http\Controllers\CommunicationPersonalizationController;
use Modules\Settings\Http\Controllers\UserSettingsController;
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
    Route::get('/content', [ContentSettingController::class, 'index'])->name('content');
    Route::put('/content', [ContentSettingController::class, 'update'])->name('content.update');
    Route::get('/communicationpersonalization', [CommunicationPersonalizationController::class, 'edit'])->name('communicationpersonalization');
    Route::put('/communicationpersonalization', [CommunicationPersonalizationController::class, 'update'])->name('communicationpersonalization.update');
    Route::get('/usersettings', [UserSettingsController::class, 'index'])->name('usersettings.index');
    Route::put('/usersettings', [UserSettingsController::class, 'update'])->name('usersettings.update');
});

