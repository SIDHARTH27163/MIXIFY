<?php
namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class FriendFollowerSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'friend_request_permission',
        'approve_followers_manually',
        'remove_follower_without_blocking',
        'default_group_visibility',
    ];
}
