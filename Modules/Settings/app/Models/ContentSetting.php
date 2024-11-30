<?php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Settings\Database\Factories\ContentSettingFactory;

class ContentSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'post_visibility',
        'location_sharing',
        'hide_sensitive_content',
        'auto_play_videos',
        'language',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // protected static function newFactory(): ContentSettingFactory
    // {
    //     // return ContentSettingFactory::new();
    // }
}
