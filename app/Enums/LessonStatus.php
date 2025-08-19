<?php

namespace App\Enums;

enum LessonStatus: int
{
    case PENDING = 1;
    case PROCESSING = 2;
    case READY = 3;

    public function title(): string
    {

        return match($this) {
            self::PENDING => __('lesson_statuses.pending'),
            self::PROCESSING => __('lesson_statuses.processing'),
            self::READY => __('lesson_statuses.ready')
        };
    }

    public function color(): string
    {
        return match($this) {
            self::PENDING     => 'warning',
            self::PROCESSING   => 'info',
            self::READY => 'success',
        };
    }


}
