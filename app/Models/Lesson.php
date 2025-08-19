<?php

namespace App\Models;

use App\Enums\CourseStatus;
use App\Enums\FileType;
use App\Enums\LessonStatus;
use App\Enums\LessonType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons.lessons';
    protected $casts = [
        'title' => 'array',
    ];

    protected $fillable = [
        'module_id',
        'title',
        'description',
        'price',
        'sort_order',
        'is_free',
        'type',
        'text_content',
        'status'
    ];


    public function module()
    {
        return $this->belongsTo(CourseModule::class, 'module_id');

    }

    public function video()
    {
        return $this->morphOne(File::class, 'fileable')->where('type', FileType::LESSON_VIDEO->value);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function attachments()
    {
        return $this->morphMany(File::class, 'fileable')->where('type', FileType::ATTACHMENT->value);
    }

    public function isVideo(): bool
    {
        return $this->type == LessonType::VIDEO_CONTENT->value;
    }

    public function isText(): bool
    {
        return $this->type == LessonType::TEXT_CONTENT->value;
    }

    public function getFormattedPriceAttribute()
    {
        if ($this->module->course->is_lesson_purchase_available) {
            if ($this->is_free) {
                return 'Бепул';
            } else {
                return number_format($this->price, 0, '.', ' ') . ' UZS';
            }
        }

    }

    public function getStatusTextAttribute(): string
    {
        return LessonStatus::from($this->status)->title();
    }

    public function getStatusColorAttribute(): string
    {
        return LessonStatus::from($this->status)->color();
    }

}
