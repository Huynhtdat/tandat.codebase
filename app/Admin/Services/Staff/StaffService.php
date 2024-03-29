<?php

namespace App\Admin\Services\Staff;

use App\Admin\Services\Staff\StaffServiceInterface;
use  App\Admin\Repositories\Staff\StaffRepositoryInterface;
use Illuminate\Http\Request;
use App\Admin\Traits\Setup;
use Illuminate\Support\Str;

class StaffService implements StaffServiceInterface
{
    use Setup;
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;

    protected $repository;

    public function __construct(StaffRepositoryInterface $repository){
        $this->repository = $repository;
    }

    public function store(Request $request){

        $this->data = $request->validated();
        $this->data['code'] = $this->createCodeUser();
        $this->data['password'] = bcrypt($this->data['password']);

        return $this->repository->create($this->data);
    }

    public function update(Request $request){

        $this->data = $request->validated();

        if(isset($this->data['password']) && $this->data['password']){
            $this->data['password'] = bcrypt($this->data['password']);
        }else{
            unset($this->data['password']);
        }

        return $this->repository->update($this->data['id'], $this->data);

    }

    public function delete($id){
        return $this->repository->delete($id);

    }

}
