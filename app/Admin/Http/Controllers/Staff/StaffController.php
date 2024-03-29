<?php

namespace App\Admin\Http\Controllers\Staff;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Staff\StaffRequest;
use App\Admin\Repositories\Staff\StaffRepositoryInterface;
use App\Admin\Services\Staff\StaffServiceInterface;
use App\Admin\DataTables\Staff\StaffDataTable;
use App\Enums\Staff\{StaffRoles, StaffGender};

class StaffController extends Controller
{
    public function __construct(
        StaffRepositoryInterface $repository,
        StaffServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;

    }

    public function getView(){
        return [
            'index' => 'admin.staffs.index',
            'create' => 'admin.staffs.create',
            'edit' => 'admin.staffs.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.staff.index',
            'create' => 'admin.staff.create',
            'edit' => 'admin.staff.edit',
            'delete' => 'admin.staff.delete'
        ];
    }
    public function index(StaffDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
            'roles' => StaffRoles::asSelectArray(),
            'gender' => StaffGender::asSelectArray()
        ]);
    }

    public function create(){
        return view($this->view['create'], [
            'roles' => StaffRoles::asSelectArray(),
            'gender' => StaffGender::asSelectArray()
        ]);
    }

    public function store(StaffRequest $request){

        $instance = $this->service->store($request);

        return redirect()->route($this->route['edit'], $instance->id);

    }

    public function edit($id){

        $instance = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            [
                'staff' => $instance,
                'roles' => StaffRoles::asSelectArray(),
                'gender' => StaffGender::asSelectArray()
            ],
        );

    }

    public function update(StaffRequest $request){

        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));

    }

    public function delete($id){

        $this->service->delete($id);

        return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));

    }
}
