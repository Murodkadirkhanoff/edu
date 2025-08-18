<?php

namespace App\Enums;

enum CourseStatus: int
{
    case DRAFT = 1;          // Черновик — ещё не опубликован
    case PENDING = 2;        // Ожидает подтверждения / модерации
    case PUBLISHED = 3;      // Опубликован
    case REJECTED = 4;       // Отклонён (например, модерацией)
    case ARCHIVED = 5;       // Архивирован (устаревшее, скрытое)
    case DELETED = 6;        // Помечен как удалённый (soft delete)

    /** Заголовок на текущем locale (например, pt, ru, en) */
    public function title(): string
    {

        return match($this) {
            self::DRAFT => __('course_statuses.draft'),
            self::PENDING => __('course_statuses.pending'),
            self::PUBLISHED => __('course_statuses.published'),
            self::REJECTED => __('course_statuses.rejected'),
            self::ARCHIVED => __('course_statuses.archived'),
            self::DELETED => __('course_statuses.deleted'),
        };
    }

    public function color(): string
    {
        return match($this) {
            self::DRAFT     => 'secondary',   // серый
            self::PENDING   => 'warning',     // жёлтый
            self::PUBLISHED => 'success',     // зелёный
            self::REJECTED  => 'danger',      // красный
            self::ARCHIVED  => 'dark',        // тёмно‑серый
            self::DELETED   => 'light',       // светло‑серый
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


    public static function toInstructorOptions(): array
    {
        // Определяем, какие именно случаи нам нужны
        $allowed = [
            self::DRAFT,
            self::PENDING,
        ];

        return array_reduce(self::cases(), function(array $carry, self $status) use ($allowed) {
            if (! in_array($status, $allowed, true)) {
                return $carry;
            }
            $carry[$status->value] = $status->title();
            return $carry;
        }, []);
    }
}
