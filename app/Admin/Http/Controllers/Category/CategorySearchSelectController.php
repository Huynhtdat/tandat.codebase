<?php

namespace App\Admin\Http\Controllers\Category;

use App\Admin\Http\Controllers\BaseSearchSelectController;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Http\Resources\Category\CategorySearchSelectResource;

class CategorySearchSelectController extends BaseSearchSelectController
{
    public function __construct(
        CategoryRepositoryInterface $repository
    ){
        $this->repository = $repository;
    }

    protected function selectResponse(){
        $this->instance = [
            'results' => CategorySearchSelectResource::collection($this->instance)
        ];
    }
}
