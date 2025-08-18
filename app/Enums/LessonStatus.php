<?php

namespace App\Enums;

enum LessonStatus: int
{
    case PENDING = 1;
    case PROCESSING = 2;
    case READY = 3;

}
