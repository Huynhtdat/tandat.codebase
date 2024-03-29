<?php

namespace App\Admin\Http\Requests\Post;

use App\Admin\Http\Requests\BaseRequest;
use App\Enums\Post\PostStatus;
use Illuminate\Validation\Rules\Enum;

use Illuminate\Validation\Rule;

class PostRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function methodPost()
    {
        return [
            'title' => ['required', 'string'],

            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'status' => ['required', new Enum(PostStatus::class)]
        ];
    }

    protected function methodPut()
    {
        return [
            'id' => ['required', 'exists:App\Models\Post,id'],
            'title' => ['required', 'string'],

            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'status' => ['required', new Enum(PostStatus::class)]
        ];
    }
}
