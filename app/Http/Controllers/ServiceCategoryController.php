<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateServiceCategoryRequest;
use App\Http\Requests\UpdateServiceCategoryRequest;
use App\Repositories\ServiceCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ServiceCategoryController extends AppBaseController
{
    /** @var  ServiceCategoryRepository */
    private $serviceCategoryRepository;

    public function __construct(ServiceCategoryRepository $serviceCategoryRepo)
    {
        $this->serviceCategoryRepository = $serviceCategoryRepo;
    }

    /**
     * Display a listing of the ServiceCategory.
     *
     * @param ServiceCategoryDataTable $serviceCategoryDataTable
     * @return Response
     */
    public function index(ServiceCategoryDataTable $serviceCategoryDataTable)
    {
        return $serviceCategoryDataTable->render('service_categories.index');
    }

    /**
     * Show the form for creating a new ServiceCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_categories.create');
    }

    /**
     * Store a newly created ServiceCategory in storage.
     *
     * @param CreateServiceCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateServiceCategoryRequest $request)
    {
        $input = $request->all();

        $serviceCategory = $this->serviceCategoryRepository->create($input);

        Flash::success('Service Category saved successfully.');

        return redirect(route('serviceCategories.index'));
    }

    /**
     * Display the specified ServiceCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('serviceCategories.index'));
        }

        return view('service_categories.show')->with('serviceCategory', $serviceCategory);
    }

    /**
     * Show the form for editing the specified ServiceCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('serviceCategories.index'));
        }

        return view('service_categories.edit')->with('serviceCategory', $serviceCategory);
    }

    /**
     * Update the specified ServiceCategory in storage.
     *
     * @param  int              $id
     * @param UpdateServiceCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServiceCategoryRequest $request)
    {
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('serviceCategories.index'));
        }

        $serviceCategory = $this->serviceCategoryRepository->update($request->all(), $id);

        Flash::success('Service Category updated successfully.');

        return redirect(route('serviceCategories.index'));
    }

    /**
     * Remove the specified ServiceCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceCategory = $this->serviceCategoryRepository->find($id);

        if (empty($serviceCategory)) {
            Flash::error('Service Category not found');

            return redirect(route('serviceCategories.index'));
        }

        $this->serviceCategoryRepository->delete($id);

        Flash::success('Service Category deleted successfully.');

        return redirect(route('serviceCategories.index'));
    }
}
