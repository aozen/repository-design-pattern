<?php

namespace App\Repositories;

use App\Enums\CommentStatus;
use App\Models\Comment;
use stdClass;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
    }

    // Overriding BaseRepository method
    // For example. If I have to pass ANALYZING case when $data['status'] is not exists. This can be handle in CommentRepository.
    //(Maybe here is not a great place to apply this usage. In Comment Model we can use creating case on boot method)
    public function create(array $data): stdClass
    {
        return (object) $this->model->create([
            'email' => $data['email'],
            'body' => $data['body'],
            'rate' => $data['rate'],
            'status' => $data['status'] ?? CommentStatus::ANALYZING->value,
        ])->toArray();
    }
}
