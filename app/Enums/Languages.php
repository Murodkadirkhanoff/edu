<?php

namespace App\Enums;

enum Languages: int
{
    case UZ = 1;
    case RU = 2;
    case EN = 3;

    /** Заголовок на текущем locale (например, pt, ru, en) */
    public function title(): string
    {

        return match($this) {
            self::UZ => __('languages.uz'), // «Узбекский»
            self::RU => __('languages.ru'), // «Русский»
            self::EN => __('languages.en'), // «Английский»
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
