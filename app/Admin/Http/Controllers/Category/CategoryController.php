<?php

namespace App\Admin\Http\Controllers\Category;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Category\CategoryRequest;
use App\Admin\Repositories\Category\CategoryRepositoryInterface;
use App\Admin\Services\Category\CategoryServiceInterface;
use App\Admin\DataTables\Category\CategoryDataTable;
use App\Enums\Category\CategoryStatus;

class CategoryController extends Controller
{
    public function __construct(
        CategoryRepositoryInterface $repository,
        CategoryServiceInterface $service
    ){

        parent::__construct();

        $this->repository = $repository;

        $this->service = $service;

    }

    public function getView(){
        return [
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'edit' => 'admin.categories.edit'
        ];
    }

    public function getRoute(){
        return [
            'index' => 'admin.category.index',
            'create' => 'admin.category.create',
            'edit' => 'admin.category.edit',
            'delete' => 'admin.category.delete'
        ];
    }
    public function index(CategoryDataTable $dataTable){
        return $dataTable->render($this->view['index'], [
            'status' => CategoryStatus::asSelectArray()
        ]);
    }
    public function create(){
            return view($this->view['create'], [
                'status' => CategoryStatus::asSelectArray()
        ]);
    }

    public function store(CategoryRequest $request){

        $instance = $this->service->store($request);

        return redirect()->route($this->route['edit'], $instance->id);

    }

    public function edit($id){

        $instance = $this->repository->findOrFail($id);
        return view(
            $this->view['edit'],
            [
                'category' => $instance,
                'status' => CategoryStatus::asSelectArray()
            ],
        );

    }

    public function update(CategoryRequest $request){

        $this->service->update($request);

        return back()->with('success', __('notifySuccess'));

    }

    public function delete($id){

        $this->service->delete($id);

        return redirect()->route($this->route['index'])->with('success', __('notifySuccess'));

    }
}
