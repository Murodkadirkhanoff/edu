<?php

namespace App\Enums;

enum FileType: string
{
    case THUMBNAIL = 'thumbnail';
    case CERTIFICATE = 'certificate';
    case LESSON_VIDEO = 'lesson_video';
    case ATTACHMENT = 'attachment';
    case USER_AVATAR = 'user_avatar';
}
