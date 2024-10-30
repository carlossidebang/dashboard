<?php

namespace App\Http\Controllers;

use App\DataTables\MarriageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMarriageRequest;
use App\Http\Requests\UpdateMarriageRequest;
use App\Repositories\MarriageRepository;
use App\Http\Controllers\AppBaseController;
use Laracasts\Flash\Flash;
use Response;

class MarriageController extends AppBaseController
{
    /** @var  MarriageRepository */
    private $marriageRepository;

    public function __construct(MarriageRepository $marriageRepo)
    {
        $this->marriageRepository = $marriageRepo;
    }

    /**
     * Display a listing of the Marriage.
     *
     * @param MarriageDataTable $marriageDataTable
     * @return Response
     */
    public function index(MarriageDataTable $marriageDataTable)
    {
        return $marriageDataTable->render('marriages.index');
    }

    /**
     * Show the form for creating a new Marriage.
     *
     * @return Response
     */
    public function create()
    {
        return view('marriages.create');
    }

    /**
     * Store a newly created Marriage in storage.
     *
     * @param CreateMarriageRequest $request
     *
     * @return Response
     */
    public function store(CreateMarriageRequest $request)
    {
        $input = $request->all();

        $marriage = $this->marriageRepository->create($input);

        Flash::success('Marriage saved successfully.');

        return redirect(route('marriages.index'));
    }

    /**
     * Display the specified Marriage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $marriage = $this->marriageRepository->find($id);

        if (empty($marriage)) {
            Flash::error('Marriage not found');

            return redirect(route('marriages.index'));
        }

        return view('marriages.show')->with('marriage', $marriage);
    }

    /**
     * Show the form for editing the specified Marriage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $marriage = $this->marriageRepository->find($id);

        if (empty($marriage)) {
            Flash::error('Marriage not found');

            return redirect(route('marriages.index'));
        }

        return view('marriages.edit')->with('marriage', $marriage);
    }

    /**
     * Update the specified Marriage in storage.
     *
     * @param  int              $id
     * @param UpdateMarriageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMarriageRequest $request)
    {
        $marriage = $this->marriageRepository->find($id);

        if (empty($marriage)) {
            Flash::error('Marriage not found');

            return redirect(route('marriages.index'));
        }

        $marriage = $this->marriageRepository->update($request->all(), $id);

        Flash::success('Marriage updated successfully.');

        return redirect(route('marriages.index'));
    }

    /**
     * Remove the specified Marriage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $marriage = $this->marriageRepository->find($id);

        if (empty($marriage)) {
            Flash::error('Marriage not found');

            return redirect(route('marriages.index'));
        }

        $this->marriageRepository->delete($id);

        Flash::success('Marriage deleted successfully.');

        return redirect(route('marriages.index'));
    }
}
