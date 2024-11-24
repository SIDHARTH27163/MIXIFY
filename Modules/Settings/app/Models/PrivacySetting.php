<?php
namespace Modules\Settings\Models;


use Illuminate\Database\Eloquent\Model;

class PrivacySetting extends Model
{
    protected $fillable = [
        'user_id',
        'profile_visibility',
        'last_seen_visibility',
        'activity_status',
        'content_visibility',
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
