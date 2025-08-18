<?php

namespace App\Enums;

enum CourseLevel: int
{
    case BEGINNER = 1;
    case INTERMEDIATE = 2;
    case ADVANCED = 3;

    /** Заголовок на текущем locale (например, pt, ru, en) */
    public function title(): string
    {

        return match($this) {
            self::BEGINNER => __('course_levels.beginner'),
            self::INTERMEDIATE => __('course_levels.intermediate'),
            self::ADVANCED => __('course_levels.advanced'),
        };
    }

    /**
     * Возвращает массив для <select>: value => label
     */
    public static function toSelectOptions(): array
    {
        return array_reduce(self::cases(), function(array $carry, self $lang) {
            $carry[$lang->value] = $lang->title();
            return $carry;
        }, []);
    }
}
