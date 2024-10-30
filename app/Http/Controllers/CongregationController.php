<?php

namespace App\Http\Controllers;

use App\DataTables\CongregationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCongregationRequest;
use App\Http\Requests\UpdateCongregationRequest;
use App\Repositories\CongregationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Response;

class CongregationController extends AppBaseController
{
    /** @var  CongregationRepository */
    private $congregationRepository;

    public function __construct(CongregationRepository $congregationRepo)
    {
        $this->congregationRepository = $congregationRepo;
    }

    /**
     * Display a listing of the Congregation.
     *
     * @param CongregationDataTable $congregationDataTable
     * @return Response
     */
    public function index(CongregationDataTable $congregationDataTable)
    {
        return $congregationDataTable->render('congregations.index');
    }

    /**
     * Show the form for creating a new Congregation.
     *
     * @return Response
     */
    public function create()
    {
        return view('congregations.create');
    }

    /**
     * Store a newly created Congregation in storage.
     *
     * @param CreateCongregationRequest $request
     *
     * @return Response
     */
    public function store(CreateCongregationRequest $request)
    {
        $input = $request->all();

        $congregation = $this->congregationRepository->create($input);

        Flash::success('Congregation saved successfully.');

        return redirect(route('congregations.index'));
    }

    /**
     * Display the specified Congregation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $congregation = $this->congregationRepository->find($id);

        if (empty($congregation)) {
            Flash::error('Congregation not found');

            return redirect(route('congregations.index'));
        }

        return view('congregations.show')->with('congregation', $congregation);
    }

    /**
     * Show the form for editing the specified Congregation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $congregation = $this->congregationRepository->find($id);

        if (empty($congregation)) {
            Flash::error('Congregation not found');

            return redirect(route('congregations.index'));
        }

        return view('congregations.edit')->with('congregation', $congregation);
    }

    /**
     * Update the specified Congregation in storage.
     *
     * @param  int              $id
     * @param UpdateCongregationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCongregationRequest $request)
    {
        $congregation = $this->congregationRepository->find($id);

        if (empty($congregation)) {
            Flash::error('Congregation not found');

            return redirect(route('congregations.index'));
        }

        $congregation = $this->congregationRepository->update($request->all(), $id);

        Flash::success('Congregation updated successfully.');

        return redirect(route('congregations.index'));
    }

    /**
     * Remove the specified Congregation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $congregation = $this->congregationRepository->find($id);

        if (empty($congregation)) {
            Flash::error('Congregation not found');

            return redirect(route('congregations.index'));
        }

        $this->congregationRepository->delete($id);

        Flash::success('Congregation deleted successfully.');

        return redirect(route('congregations.index'));
    }

    public function getTotalEnterOutCongregation(Request $request)
    {
        $currentYear = now()->format('Y');
        $previousYear = now()->subtract('4 year')->format('Y');
        $startDate = "$previousYear-01-01";
        $endDate = "$currentYear-12-31";

        $report = [];

        $result = DB::select('CALL TotalOutEnterForThreeYear(?, ?)', [$startDate, $endDate]);

        $report['data'] = $result;

        return response()->json($report);
    }
}
