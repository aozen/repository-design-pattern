<?php

namespace App\Enums;

enum CommentStatus: string
{
    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case PASSIVE = 'passive';
    case PENDING = 'pending';
    case TRASH = 'trash';
}
