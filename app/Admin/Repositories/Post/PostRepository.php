<?php

namespace App\Admin\Repositories\Post;

use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Post\PostRepositoryInterface;
use App\Models\Post;

class PostRepository extends EloquentRepository implements PostRepositoryInterface
{

    protected $select = [];

    public function getModel(){
        return Post::class;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}
