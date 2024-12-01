<?php
use Illuminate\Support\Facades\Route;
use Modules\Settings\Http\Controllers\SettingsController;
use Modules\Settings\Http\Controllers\PrivacySettingsController;
use Modules\Settings\Http\Controllers\NotificationSettingsController;
use Modules\Settings\Http\Controllers\ContentSettingController;
use Modules\Settings\Http\Controllers\CommunicationPersonalizationController;
use Modules\Settings\Http\Controllers\UserSettingsController;
use Modules\Settings\Http\Controllers\AccessibilitySettingsController;
use Modules\Settings\Http\Controllers\FriendFollowerSettingsController;
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
    Route::get('/communication', [CommunicationPersonalizationController::class, 'edit'])->name('communication');
    Route::put('/communication', [CommunicationPersonalizationController::class, 'update'])->name('communication.update');
    Route::get('/personalization', [UserSettingsController::class, 'index'])->name('personalization.index');
    Route::put('/personalization', [UserSettingsController::class, 'update'])->name('personalization.update');
    Route::get('/accessibility-settings', [AccessibilitySettingsController::class, 'index'])->name('accessibility-settings.index');
    Route::put('/accessibility-settings', [AccessibilitySettingsController::class, 'update'])->name('accessibility-settings.update');
    Route::get('/friend-follower', [FriendFollowerSettingsController::class, 'index'])->name('friend-follower.index');
    Route::put('/friend-follower', [FriendFollowerSettingsController::class, 'update'])->name('friend-follower.update');
});

