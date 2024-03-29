<?php

namespace App\Admin\Repositories\Staff;
use App\Admin\Repositories\EloquentRepository;
use App\Admin\Repositories\Staff\StaffRepositoryInterface;
use App\Models\Staff;

class StaffRepository extends EloquentRepository implements StaffRepositoryInterface
{
    protected $select = [];

    public function getModel(){
        return Staff::class;
    }

    public function getQueryBuilderOrderBy($column = 'id', $sort = 'DESC'){
        $this->getQueryBuilder();
        $this->instance = $this->instance->orderBy($column, $sort);
        return $this->instance;
    }
}
