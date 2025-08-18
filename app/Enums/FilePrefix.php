<?php

namespace App\Enums;

enum FilePrefix: string
{
    case THUMBNAIL  = 'courses/thumbnails';
    case LESSON_VIDEO  = 'lessons/videos';
    case LESSON_ATTACHMENT  = 'lessons/attachments';
}
