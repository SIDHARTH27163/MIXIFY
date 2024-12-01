<?php
namespace Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AccessibilitySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'font_size',
        'font_style',
        'screen_reader_support',
        'video_captions',
    ];
}
