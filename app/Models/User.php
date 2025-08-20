<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\FileType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'users.users';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'otp_code',
        'otp_expires_at',
        'telegram_id',
        'biography',
        'specialization',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'otp_expires_at' => 'datetime',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function getFullNameAttribute(): string
    {
        $first = $this->first_name ?? '';
        $last = $this->last_name ?? '';
        return trim("{$first} {$last}");
    }

    public function avatar()
    {
        return $this->morphOne(File::class, 'fileable')->where('type', FileType::USER_AVATAR->value)->latest();
    }

    public function socialProfile()
    {
        return $this->hasOne(SocialProfile::class);
    }

    public function getAvatarUrlAttribute()
    {

        if ($this->avatar) {
            // Uploaded avatar via storage or route
            return route('files.show', $this->avatar->id);
        }

        // If no avatar, generate initials
        $initials = strtoupper(
            mb_substr($this->first_name ?? '', 0, 1) .
            mb_substr($this->last_name ?? '', 0, 1)
        );

        // Generate background color (hash based on user id or name for consistency)
        $colors = ['#1abc9c', '#3498db', '#9b59b6', '#e67e22', '#e74c3c', '#2ecc71'];
        $color = $colors[$this->id % count($colors)];

        // Build SVG avatar
        $svg = '
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100">
            <rect width="100%" height="100%" fill="' . $color . '"/>
            <text x="50%" y="50%" dy=".3em" text-anchor="middle" fill="white" font-size="40" font-family="Arial, sans-serif">' . $initials . '</text>
        </svg>';

        // Return base64 image
        return 'data:image/svg+xml;base64,' . base64_encode($svg);
    }
}
