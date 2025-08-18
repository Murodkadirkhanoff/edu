<?php

namespace App\Models;

use App\Enums\CourseLevel;
use App\Enums\CourseStatus;
use App\Enums\FileType;
use App\Enums\Languages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses.courses';

    protected $guarded = [
        'id',                  // PK
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'title' => 'array',
        'description' => 'array',
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function modules()
    {
        return $this->hasMany(\App\Models\CourseModule::class);
    }

    public function thumbnail()
    {
        return $this->morphOne(File::class, 'fileable')->where('type', FileType::THUMBNAIL->value);
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'courses.category_course',  // схема.table
            'course_id',
            'category_id'
        )->withTimestamps();
    }

    public function childCategory()
    {
        return $this->categories()->whereNotNull('parent_id')->first();
    }


    public function path()
    {
        return "/instructor/courses/{$this->id}";
    }

    public function getStatusTextAttribute(): string
    {
        return CourseStatus::from($this->status)->title();
    }

    public function getLanguageTextAttribute(): string
    {
        return Languages::from($this->lang_id)->title();
    }
    public function getCourseLevelTextAttribute(): string
    {
        return CourseLevel::from($this->course_level_id)->title();
    }

    public function getStatusColorAttribute(): string
    {
        return match (CourseStatus::from($this->status)) {
            CourseStatus::DRAFT     => 'secondary',
            CourseStatus::PENDING   => 'warning',
            CourseStatus::PUBLISHED => 'success',
            CourseStatus::REJECTED  => 'danger',
            CourseStatus::ARCHIVED  => 'dark',
            CourseStatus::DELETED   => 'light text-dark', // светлый фон + тёмный текст
        };
    }

    public function getFormattedWholePriceAttribute(): string
    {
        if ($this->is_whole_purchase_available) {
            return number_format($this->whole_price_minor, 0, '.', ' ') . ' UZS';
        }elseif($this->is_lesson_purchase_available){
          return 'Alohida darslar bo\'yicha sotiladi';
        }else{
            return 'Tekin';
        }
    }
}
