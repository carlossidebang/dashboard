<?php

namespace App\Http\Controllers;

use App\DataTables\CongregationDataTable;
use App\DataTables\CongregationDeathDataTable;
use App\Http\Requests;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateCongregationRequest;
use App\Http\Requests\UpdateCongregationRequest;
use App\Repositories\CongregationRepository;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;

class CongregationDeathController extends AppBaseController
{
     /** @var  CongregationRepository */
     private $congregationRepository;

     public function __construct(CongregationRepository $congregationRepo)
     {
         $this->congregationRepository = $congregationRepo;
     }

    /**
     * Display a listing of the CongregationDeath.
     *
     * @param CongregationDeathDataTable $congregationDeathDataTable
     * @return Response
     */
    public function index(CongregationDeathDataTable $congregationDeathDataTable)
    {
        return $congregationDeathDataTable->render('congregation_deaths.index');
    }

    public function death($id, Request $request)
    {
        $congregation = $this->congregationRepository->find($id);

        if (empty($congregation)) {
            Flash::error('Jemaat not found');

            return redirect(route('congregationDeaths.index'));
        }

        $congregation = $this->congregationRepository->update($request->all(), $id);

        Flash::success('Jemaat updated successfully.');

        return redirect(route('congregationDeaths.index'));
    }

    /**
     * Show the form for creating a new CongregationDeath.
     *
     * @return Response
     */
    // public function create()
    // {
    //     return view('congregation_deaths.create');
    // }

    /**
     * Store a newly created CongregationDeath in storage.
     *
     * @param CreateCongregationRequest $request
     *
     * @return Response
     */
    // public function store(CreateCongregationRequest $request)
    // {
    //     $input = $request->all();

    //     $congregationDeath = $this->congregationDeathRepository->create($input);

    //     Flash::success('Congregation Death saved successfully.');

    //     return redirect(route('congregationDeaths.index'));
    // }

    /**
     * Display the specified CongregationDeath.
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function show($id)
    // {
    //     $congregationDeath = $this->congregationRepository->find($id);

    //     if (empty($congregationDeath)) {
    //         Flash::error('Congregation Death not found');

    //         return redirect(route('congregationDeaths.index'));
    //     }

    //     return view('congregation_deaths.show')->with('congregationDeath', $congregationDeath);
    // }

    /**
     * Show the form for editing the specified CongregationDeath.
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function edit($id)
    // {
    //     $congregationDeath = $this->congregationRepository->find($id);

    //     if (empty($congregationDeath)) {
    //         Flash::error('Congregation Death not found');

    //         return redirect(route('congregationDeaths.index'));
    //     }

    //     return view('congregation_deaths.edit')->with('congregationDeath', $congregationDeath);
    // }

    /**
     * Update the specified CongregationDeath in storage.
     *
     * @param  int              $id
     * @param UpdateCongregationRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateCongregationRequest $request)
    // {
    //     $congregationDeath = $this->congregationRepository->find($id);

    //     if (empty($congregationDeath)) {
    //         Flash::error('Congregation Death not found');

    //         return redirect(route('congregationDeaths.index'));
    //     }

    //     $congregationDeath = $this->congregationRepository->update($request->all(), $id);

    //     Flash::success('Congregation Death updated successfully.');

    //     return redirect(route('congregationDeaths.index'));
    // }

    /**
     * Remove the specified CongregationDeath from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     $congregationDeath = $this->congregationRepository->find($id);

    //     if (empty($congregationDeath)) {
    //         Flash::error('Congregation Death not found');

    //         return redirect(route('congregationDeaths.index'));
    //     }

    //     $this->congregationRepository->delete($id);

    //     Flash::success('Congregation Death deleted successfully.');

    //     return redirect(route('congregationDeaths.index'));
    // }
}
