<?php

namespace App\Http\Controllers;

use App\DataTables\CongregationOutDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCongregationOutRequest;
use App\Http\Requests\UpdateCongregationOutRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CongregationRepository;
use Laracasts\Flash\Flash;
use Response;

class CongregationOutController extends AppBaseController
{
    /** @var  CongregationRepository */
    private $congregationRepository;

    public function __construct(CongregationRepository $congregationRepo)
    {
        $this->congregationRepository = $congregationRepo;
    }

    /**
     * Display a listing of the CongregationOut.
     *
     * @param CongregationOutDataTable $congregationOutDataTable
     * @return Response
     */
    public function index(CongregationOutDataTable $congregationOutDataTable)
    {
        return $congregationOutDataTable->render('congregation_outs.index');
    }

    /**
     * Show the form for creating a new CongregationOut.
     *
     * @return Response
     */
    // public function create()
    // {
    //     return view('congregation_outs.create');
    // }

    /**
     * Store a newly created CongregationOut in storage.
     *
     * @param CreateCongregationOutRequest $request
     *
     * @return Response
     */
    // public function store(CreateCongregationOutRequest $request)
    // {
    //     $input = $request->all();

    //     $congregationOut = $this->congregationOutRepository->create($input);

    //     Flash::success('Congregation Out saved successfully.');

    //     return redirect(route('congregationOuts.index'));
    // }

    /**
     * Display the specified CongregationOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $congregationOut = $this->congregationOutRepository->find($id);

    //     if (empty($congregationOut)) {
    //         Flash::error('Congregation Out not found');

    //         return redirect(route('congregationOuts.index'));
    //     }

    //     return view('congregation_outs.show')->with('congregationOut', $congregationOut);
    // }

    /**
     * Show the form for editing the specified CongregationOut.
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $congregationOut = $this->congregationOutRepository->find($id);

    //     if (empty($congregationOut)) {
    //         Flash::error('Congregation Out not found');

    //         return redirect(route('congregationOuts.index'));
    //     }

    //     return view('congregation_outs.edit')->with('congregationOut', $congregationOut);
    // }

    /**
     * Update the specified CongregationOut in storage.
     *
     * @param  int              $id
     * @param UpdateCongregationOutRequest $request
     *
     * @return Response
     */
    public function out($id, UpdateCongregationOutRequest $request)
    {
        $congregationOut = $this->congregationRepository->find($id);

        if (empty($congregationOut)) {
            Flash::error('Congregation Out not found');

            return redirect(route('congregationOuts.index'));
        }

        $congregationOut = $this->congregationRepository->update($request->all(), $id);

        Flash::success('Congregation Out updated successfully.');

        return redirect(route('congregationOuts.index'));
    }

    /**
     * Remove the specified CongregationOut from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     $congregationOut = $this->congregationOutRepository->find($id);

    //     if (empty($congregationOut)) {
    //         Flash::error('Congregation Out not found');

    //         return redirect(route('congregationOuts.index'));
    //     }

    //     $this->congregationOutRepository->delete($id);

    //     Flash::success('Congregation Out deleted successfully.');

    //     return redirect(route('congregationOuts.index'));
    // }
}
