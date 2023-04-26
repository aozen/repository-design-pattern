<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Repositories\CommentRepositoryInterface;

class CommentController extends Controller
{
    public function __construct(protected CommentRepositoryInterface $repository)
    {
    }

    public function index()
    {
        return CommentResource::collection(
            $this->repository->all()
        );
    }

    public function store(CommentRequest $request)
    {
        return new CommentResource(
            $this->repository->create(
                $request->validated()
            )
        );
    }

    public function show(Comment $comment)
    {
        return new CommentResource(
            $this->repository->find(
                $comment->id
            )
        );
    }

    public function update(CommentRequest $request, Comment $comment)
    {

        return new CommentResource(
            $this->repository->update(
                $comment->id,
                $request->validated()
            )
        );
    }

    public function delete(Comment $comment)
    {
        return $this->repository->delete(
            $comment->id
        );
    }
}
