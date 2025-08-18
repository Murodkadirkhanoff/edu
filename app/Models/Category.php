<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'courses.categories';

    protected $fillable = [
        'parent_id',
        'title_uz', 'title_ru', 'title_en',
        'slug',
    ];

    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'courses.category_course',
            'category_id',
            'course_id'
        )->withTimestamps();
    }

    /* ───── RELATIONS ───── */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /* ───── Скоуп корневых категорий ───── */
    public function scopeRoot($q)
    {
        return $q->whereNull('parent_id');
    }

    /**
     * Get the title for the current locale.
     */
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_en ?? $this->title_uz ?? 'Untitled';
    }

    /**
     * Get the route key name for model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
