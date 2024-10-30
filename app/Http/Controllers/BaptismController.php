<?php

namespace App\Http\Controllers;

use App\DataTables\BaptismDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBaptismRequest;
use App\Http\Requests\UpdateBaptismRequest;
use App\Repositories\BaptismRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BaptismController extends AppBaseController
{
    /** @var  BaptismRepository */
    private $baptismRepository;

    public function __construct(BaptismRepository $baptismRepo)
    {
        $this->baptismRepository = $baptismRepo;
    }

    /**
     * Display a listing of the Baptism.
     *
     * @param BaptismDataTable $baptismDataTable
     * @return Response
     */
    public function index(BaptismDataTable $baptismDataTable)
    {
        return $baptismDataTable->render('baptisms.index');
    }

    /**
     * Show the form for creating a new Baptism.
     *
     * @return Response
     */
    public function create()
    {
        return view('baptisms.create');
    }

    /**
     * Store a newly created Baptism in storage.
     *
     * @param CreateBaptismRequest $request
     *
     * @return Response
     */
    public function store(CreateBaptismRequest $request)
    {
        $input = $request->all();

        $baptism = $this->baptismRepository->create($input);

        Flash::success('Baptism saved successfully.');

        return redirect(route('baptisms.index'));
    }

    /**
     * Display the specified Baptism.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $baptism = $this->baptismRepository->find($id);

        if (empty($baptism)) {
            Flash::error('Baptism not found');

            return redirect(route('baptisms.index'));
        }

        return view('baptisms.show')->with('baptism', $baptism);
    }

    /**
     * Show the form for editing the specified Baptism.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $baptism = $this->baptismRepository->find($id);

        if (empty($baptism)) {
            Flash::error('Baptism not found');

            return redirect(route('baptisms.index'));
        }

        return view('baptisms.edit')->with('baptism', $baptism);
    }

    /**
     * Update the specified Baptism in storage.
     *
     * @param  int              $id
     * @param UpdateBaptismRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBaptismRequest $request)
    {
        $baptism = $this->baptismRepository->find($id);

        if (empty($baptism)) {
            Flash::error('Baptism not found');

            return redirect(route('baptisms.index'));
        }

        $baptism = $this->baptismRepository->update($request->all(), $id);

        Flash::success('Baptism updated successfully.');

        return redirect(route('baptisms.index'));
    }

    /**
     * Remove the specified Baptism from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $baptism = $this->baptismRepository->find($id);

        if (empty($baptism)) {
            Flash::error('Baptism not found');

            return redirect(route('baptisms.index'));
        }

        $this->baptismRepository->delete($id);

        Flash::success('Baptism deleted successfully.');

        return redirect(route('baptisms.index'));
    }
}
