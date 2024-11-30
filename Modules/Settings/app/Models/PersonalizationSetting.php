<?php
// Modules/Setting/Entities/PersonalizationSetting.php

namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PersonalizationSetting extends Model
{
    protected $fillable = [
        'user_id',
        'data_usage',
        'personalization',
    ];
}
