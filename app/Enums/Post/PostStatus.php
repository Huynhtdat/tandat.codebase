<?php

namespace App\Enums\Post;

use App\Support\Enum;

enum PostStatus: int {
    use Enum;

    case Draft = 1;
    case Published = 2;
}
