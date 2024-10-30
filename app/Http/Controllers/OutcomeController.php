<?php

namespace App\Http\Controllers;

use App\DataTables\OutcomeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOutcomeRequest;
use App\Http\Requests\UpdateOutcomeRequest;
use App\Repositories\OutcomeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Response;


class OutcomeController extends AppBaseController
{
    /** @var  OutcomeRepository */
    private $outcomeRepository;

    public function __construct(OutcomeRepository $outcomeRepo)
    {
        $this->outcomeRepository = $outcomeRepo;
    }

    /**
     * Display a listing of the Outcome.
     *
     * @param OutcomeDataTable $outcomeDataTable
     * @return Response
     */
    public function index(OutcomeDataTable $outcomeDataTable)
    {
        return $outcomeDataTable->render('outcomes.index');
    }

    /**
     * Show the form for creating a new Outcome.
     *
     * @return Response
     */
    public function create()
    {
        return view('outcomes.create');
    }

    /**
     * Store a newly created Outcome in storage.
     *
     * @param CreateOutcomeRequest $request
     *
     * @return Response
     */
    public function store(CreateOutcomeRequest $request)
    {
        $input = $request->all();

        $outcome = $this->outcomeRepository->create($input);

        Flash::success('Outcome saved successfully.');

        return redirect(route('outcomes.index'));
    }

    /**
     * Display the specified Outcome.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('outcomes.index'));
        }

        return view('outcomes.show')->with('outcome', $outcome);
    }

    /**
     * Show the form for editing the specified Outcome.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('outcomes.index'));
        }

        return view('outcomes.edit')->with('outcome', $outcome);
    }

    /**
     * Update the specified Outcome in storage.
     *
     * @param  int              $id
     * @param UpdateOutcomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOutcomeRequest $request)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('outcomes.index'));
        }

        $outcome = $this->outcomeRepository->update($request->all(), $id);

        Flash::success('Outcome updated successfully.');

        return redirect(route('outcomes.index'));
    }

    /**
     * Remove the specified Outcome from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $outcome = $this->outcomeRepository->find($id);

        if (empty($outcome)) {
            Flash::error('Outcome not found');

            return redirect(route('outcomes.index'));
        }

        $this->outcomeRepository->delete($id);

        Flash::success('Outcome deleted successfully.');

        return redirect(route('outcomes.index'));
    }

    public function getOutcomeMonthlyReport(Request $request)
    {
        $report = $this->outcomeRepository->getOutcomeMonthlyReport($request);

        return response()->json($report);
    }
}
