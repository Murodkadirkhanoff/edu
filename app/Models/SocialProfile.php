<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{

    protected $table = 'users.social_profiles';
    protected $fillable = [
        'twitter_profile',
        'telegram_profile',
        'facebook_profile',
        'instagram_profile',
        'linkedin_profile',
        'youtube_profile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
