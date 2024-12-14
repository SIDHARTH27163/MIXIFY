<?php

namespace Modules\Posts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User; // Updated to reference the User model in the main structure

class Post extends Model
{
    use HasFactory;

    // Define the mass assignable fields
    protected $fillable = [
        'title',
        'caption',
        'content',
        'media',
        'user_id',
        'hashtags',
        'tags',
        'location',
    ];

    // Define type casting for fields
    protected $casts = [
        'media' => 'array',  // Updated to match `fillable`
        'hashtags' => 'array',
        'tags' => 'array',   // Added cast for tags
        'location' => 'string', // Added cast for location (optional, depending on type)
    ];

    /**
     * Define relationship to User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Extract hashtags from a given string.
     *
     * @param string $content
     * @return array
     */
    public static function extractHashtags($content)
    {
        preg_match_all('/#(\w+)/', $content, $matches);
        return $matches[1] ?? [];
    }
}
