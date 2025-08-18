<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class File extends Model
{

    public $incrementing = false; // 🚫 отключить автоинкремент

    protected $keyType = 'string'; // ✅ UUID — это строка

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
    protected $table = 'media.files';

    protected $fillable = [
        'path', 'type', 'disk',
        'original_name', 'extension', 'mime_type', 'file_size',
        'description', 'expires_at',
        'fileable_type', 'fileable_id',
        'user_id', 'uploaded_by'
    ];

    protected $dates = ['expires_at'];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
