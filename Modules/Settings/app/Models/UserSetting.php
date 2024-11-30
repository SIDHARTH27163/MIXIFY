<?php
namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class UserSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'allow_data_sharing',
        'data_copy_download',
        'manage_interests',
        'disable_personalized_ads',
        'enable_tracking',
        'clear_history',
        'custom_appearance',
    ];

    protected $casts = [
        'allow_data_sharing' => 'boolean',
        'data_copy_download' => 'boolean',
        'manage_interests' => 'boolean',
        'disable_personalized_ads' => 'boolean',
        'enable_tracking' => 'boolean',
        'clear_history' => 'boolean',
        'custom_appearance' => 'array',
    ];
}