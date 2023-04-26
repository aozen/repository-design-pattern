<?php

namespace App\Http\Requests;

use App\Enums\CommentStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['sometimes', 'email', 'max:254'],
            'body' => ['sometimes'],
            'rate' => ['sometimes', 'int', 'max:5', 'min:1'],
            'status' => ['nullable', new Enum(type: CommentStatus::class)],
        ];
    }
}
