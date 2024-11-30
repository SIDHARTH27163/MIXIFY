<?php
// Modules/Setting/Entities/CommunicationSetting.php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommunicationSetting extends Model
{
    protected $fillable = [
        'user_id',
        'allow_messages_from',
        'auto_delete_messages_after_days',
        'who_can_comment',
        'block_offensive_comments',
        'who_can_tag',
        'who_can_mention',
    ];
}
