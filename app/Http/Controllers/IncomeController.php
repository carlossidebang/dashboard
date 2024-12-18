<?php

namespace App\Http\Controllers;

use App\DataTables\IncomeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Repositories\IncomeRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Income;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Response;
use stdClass;

class IncomeController extends AppBaseController
{
    /** @var  IncomeRepository */
    private $incomeRepository;

    public function __construct(IncomeRepository $incomeRepo)
    {
        $this->incomeRepository = $incomeRepo;
    }

    /**
     * Display a listing of the Income.
     *
     * @param IncomeDataTable $incomeDataTable
     * @return Response
     */
    public function index(IncomeDataTable $incomeDataTable)
    {
        $currentYear = now()->format('Y');
        $defaultResponse = new stdClass();
        $defaultResponse->year = $currentYear;
        $defaultResponse->nominal = 0;
        $routineIncome = Income::select(DB::raw('YEAR(income_date) as year'), DB::raw('SUM(nominal) as nominal'))
            ->where(DB::raw('YEAR(income_date)'), $currentYear)
            ->where(function (Builder $query) {
                $query->where('service_category_id', 9)
                    ->whereOr('service_category_id', 10);
            })
            ->groupBy(DB::raw('YEAR(income_date)'))
            ->get();

        $incomeOfYear = Income::select(DB::raw('YEAR(income_date) as year'), DB::raw('SUM(nominal) as nominal'))
            ->where(DB::raw('YEAR(income_date)'), $currentYear)
            ->groupBy(DB::raw('YEAR(income_date)'))
            ->get();

        $incomeYouth = Income::select(DB::raw('YEAR(income_date) as year'), DB::raw('SUM(nominal) as nominal'))
            ->where(DB::raw('YEAR(income_date)'), $currentYear)
            ->where('service_category_id', 15)
            ->groupBy(DB::raw('YEAR(income_date)'))
            ->get();

        $incomeKid = Income::select(DB::raw('YEAR(income_date) as year'), DB::raw('SUM(nominal) as nominal'))
            ->where(DB::raw('YEAR(income_date)'), $currentYear)
            ->where('service_category_id', 14)
            ->groupBy(DB::raw('YEAR(income_date)'))
            ->get();

        // progress bar
        $total = intval($incomeOfYear[0]->nominal ?? $defaultResponse->nominal);
        $percentage = ($total / 200000000) * 100;
        $finalValue = min($percentage, 100);
        $progressCurrentYear = number_format($finalValue, 1); // format belakang koma 1 angka
        $progressColor = ($progressCurrentYear > 75 ? 'bg-success' : $progressCurrentYear < 25) ? 'bg-danger' : 'bg-warning';

        return $incomeDataTable->render('incomes.index', [
            'current_year' => $currentYear,
            'income_routine' => (sizeof($routineIncome) == 0) ?  $defaultResponse : $routineIncome[0],
            'income_year' => (sizeof($incomeOfYear) == 0) ?  $defaultResponse : $incomeOfYear[0],
            'income_kid' => (sizeof($incomeKid) == 0) ?  $defaultResponse : $incomeKid[0],
            'income_youth' => (sizeof($incomeYouth) == 0) ?  $defaultResponse : $incomeYouth[0],
            'progress_current_year' => $progressCurrentYear,
            'progress_color' => $progressColor
        ]);
    }

    /**
     * Show the form for creating a new Income.
     *
     * @return Response
     */
    public function create()
    {
        return view('incomes.create');
    }

    /**
     * Store a newly created Income in storage.
     *
     * @param CreateIncomeRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomeRequest $request)
    {
        $input = $request->all();

        $income = $this->incomeRepository->create($input);

        Flash::success('Income saved successfully.');

        return redirect(route('incomes.index'));
    }

    /**
     * Display the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('incomes.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified Income.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        return view('incomes.edit')->with('income', $income);
    }

    /**
     * Update the specified Income in storage.
     *
     * @param  int              $id
     * @param UpdateIncomeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncomeRequest $request)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        $income = $this->incomeRepository->update($request->all(), $id);

        Flash::success('Income updated successfully.');

        return redirect(route('incomes.index'));
    }

    /**
     * Remove the specified Income from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $income = $this->incomeRepository->find($id);

        if (empty($income)) {
            Flash::error('Income not found');

            return redirect(route('incomes.index'));
        }

        $this->incomeRepository->delete($id);

        Flash::success('Income deleted successfully.');

        return redirect(route('incomes.index'));
    }

    public function getIncomeMonthlyReport(Request $request)
    {
        $report = $this->incomeRepository->getIncomeMonthlyReport($request);

        return response()->json($report);
    }

    public function getIncomeYearByCategories(string $year, string $categories)
    {
        switch ($categories) {
            case 'income_year':
                $incomeOfYear = Income::select(DB::raw('YEAR(income_date) as year'), DB::raw('SUM(nominal) as nominal'))
                    ->where(DB::raw('YEAR(income_date)'), $year)
                    ->groupBy(DB::raw('YEAR(income_date)'))
                    ->get();

                return response()->json($incomeOfYear->count() > 0 ? $incomeOfYear[0]->toArray() : ['year' => $year, 'nominal' => 0]);
            case 'income_youth':
                $incomeYouth = Income::select(DB::raw('YEAR(income_date) as year'), DB::raw('SUM(nominal) as nominal'))
                    ->where(DB::raw('YEAR(income_date)'), $year)
                    ->where('service_category_id', 15)
                    ->groupBy(DB::raw('YEAR(income_date)'))
                    ->get();

                return response()->json( $incomeYouth->count() > 0 ? $incomeYouth[0]->toArray() : ['year' => $year, 'nominal' => 0]);
            case 'income_kid':
                $incomeKid = Income::select(DB::raw('YEAR(income_date) as year'), DB::raw('SUM(nominal) as nominal'))
                    ->where(DB::raw('YEAR(income_date)'), $year)
                    ->where('service_category_id', 14)
                    ->groupBy(DB::raw('YEAR(income_date)'))
                    ->get();

                return response()->json($incomeKid->count() > 0 ? $incomeKid[0]->toArray() : ['year' => $year, 'nominal' => 0]);
            case 'income_routine':
                $routineIncome = Income::select(DB::raw('YEAR(income_date) as year'), DB::raw('SUM(nominal) as nominal'))
                    ->where(DB::raw('YEAR(income_date)'), $year)
                    ->where(function (Builder $query) {
                        $query->where('service_category_id', 9)
                            ->whereOr('service_category_id', 10);
                    })
                    ->groupBy(DB::raw('YEAR(income_date)'))
                    ->get();

                return response()->json($routineIncome->count() > 0 ? $routineIncome[0]->toArray() : ['year' => $year, 'nominal' => 0]);

        }
        // 'income_routine'
        // 'income_year'
        // 'income_kid'
        // 'income_youth'
    }
}
