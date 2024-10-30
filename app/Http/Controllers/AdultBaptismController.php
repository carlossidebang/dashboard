<?php

namespace App\Http\Controllers;

use App\DataTables\AdultBaptismDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAdultBaptismRequest;
use App\Http\Requests\UpdateAdultBaptismRequest;
use App\Repositories\AdultBaptismRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AdultBaptismController extends AppBaseController
{
    /** @var  AdultBaptismRepository */
    private $adultBaptismRepository;

    public function __construct(AdultBaptismRepository $adultBaptismRepo)
    {
        $this->adultBaptismRepository = $adultBaptismRepo;
    }

    /**
     * Display a listing of the AdultBaptism.
     *
     * @param AdultBaptismDataTable $adultBaptismDataTable
     * @return Response
     */
    public function index(AdultBaptismDataTable $adultBaptismDataTable)
    {
        return $adultBaptismDataTable->render('adult_baptisms.index');
    }

    /**
     * Show the form for creating a new AdultBaptism.
     *
     * @return Response
     */
    public function create()
    {
        return view('adult_baptisms.create');
    }

    /**
     * Store a newly created AdultBaptism in storage.
     *
     * @param CreateAdultBaptismRequest $request
     *
     * @return Response
     */
    public function store(CreateAdultBaptismRequest $request)
    {
        $input = $request->all();

        $adultBaptism = $this->adultBaptismRepository->create($input);

        Flash::success('Adult Baptism saved successfully.');

        return redirect(route('adultBaptisms.index'));
    }

    /**
     * Display the specified AdultBaptism.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $adultBaptism = $this->adultBaptismRepository->find($id);

        if (empty($adultBaptism)) {
            Flash::error('Adult Baptism not found');

            return redirect(route('adultBaptisms.index'));
        }

        return view('adult_baptisms.show')->with('adultBaptism', $adultBaptism);
    }

    /**
     * Show the form for editing the specified AdultBaptism.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $adultBaptism = $this->adultBaptismRepository->find($id);

        if (empty($adultBaptism)) {
            Flash::error('Adult Baptism not found');

            return redirect(route('adultBaptisms.index'));
        }

        return view('adult_baptisms.edit')->with('adultBaptism', $adultBaptism);
    }

    /**
     * Update the specified AdultBaptism in storage.
     *
     * @param  int              $id
     * @param UpdateAdultBaptismRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAdultBaptismRequest $request)
    {
        $adultBaptism = $this->adultBaptismRepository->find($id);

        if (empty($adultBaptism)) {
            Flash::error('Adult Baptism not found');

            return redirect(route('adultBaptisms.index'));
        }

        $adultBaptism = $this->adultBaptismRepository->update($request->all(), $id);

        Flash::success('Adult Baptism updated successfully.');

        return redirect(route('adultBaptisms.index'));
    }

    /**
     * Remove the specified AdultBaptism from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $adultBaptism = $this->adultBaptismRepository->find($id);

        if (empty($adultBaptism)) {
            Flash::error('Adult Baptism not found');

            return redirect(route('adultBaptisms.index'));
        }

        $this->adultBaptismRepository->delete($id);

        Flash::success('Adult Baptism deleted successfully.');

        return redirect(route('adultBaptisms.index'));
    }
}
