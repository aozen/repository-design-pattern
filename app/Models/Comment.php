<?php

namespace App\Models;

use App\Enums\CommentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'email',
        'body',
        'rate',
        'status',
    ];

    protected $casts = [
        'status' => CommentStatus::class,
    ];
}
