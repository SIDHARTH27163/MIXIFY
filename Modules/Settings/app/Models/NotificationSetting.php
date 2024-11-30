<?php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Settings\Database\Factories\NotificationSettingFactory;

class NotificationSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'push_likes', 'push_comments', 'push_shares', 'push_messages', 
        'push_friend_requests', 'push_follower_updates',
        'email_weekly_summary', 'email_security_alerts', 'email_updates_followed',
        'inapp_mentions', 'inapp_tagged', 'sound', 'vibrate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): NotificationSettingFactory
    // {
    //     // return NotificationSettingFactory::new();
    // }
}
