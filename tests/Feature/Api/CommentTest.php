<?php

namespace Tests\Feature\Api;

use App\Models\Comment;
use Tests\TestCase;

class CommentTest extends TestCase
{
    public function test_stores_a_comment()
    {
        $this->post('/api/comments', [
            'email' => 'aliozendev@gmail.com',
            'body' => 'create comment | testing repository pattern',
            'rate' => 5,
        ])->assertSuccessful();
    }

    public function test_updates_a_comment() {
        $comment = Comment::first();
        $this->put('/api/comments/' . $comment->id, [
            'body' => 'update comment | testing repository pattern'
        ])->assertSuccessful();
    }

    public function test_delete_a_comment() {
        $comment = Comment::first();
        $this->delete('/api/comments/' . $comment->id)->assertSuccessful();
    }
}
