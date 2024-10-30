<?php

namespace App\Http\Controllers;

use App\Models\Congregation;
use App\Models\Income;
use App\Models\Outcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentYear = now()->subYear(2)->format('Y');
        $defaultResponse = new stdClass();
        $defaultResponse->year = $currentYear;
        $defaultResponse->total_enter = 0;
        $defaultResponse->total_out = 0;
        $defaultResponse->nominal = 0;
        $congregationEnters = Congregation::select(DB::raw('YEAR(enter_date) as year'), DB::raw('COUNT(id) as total_enter'))
            ->where(DB::raw('YEAR(enter_date)'), $currentYear)
            ->groupBy(DB::raw('YEAR(enter_date)'))
            ->get();
        $congregationOuts = Congregation::select(DB::raw('YEAR(out_date) as year'), DB::raw('COUNT(id) as total_out'))
            ->where(DB::raw('YEAR(out_date)'), $currentYear)
            ->groupBy(DB::raw('YEAR(out_date)'))
            ->get();
        $incomeOfYear = Income::select(DB::raw('YEAR(income_date) as year'), DB::raw('SUM(nominal) as nominal'))
            ->where(DB::raw('YEAR(income_date)'), $currentYear)
            ->groupBy(DB::raw('YEAR(income_date)'))
            ->get();

        $outcomeOfYear = Outcome::select(DB::raw('YEAR(outcome_date) as year'), DB::raw('SUM(nominal) as nominal'))
            ->where(DB::raw('YEAR(outcome_date)'), $currentYear)
            ->groupBy(DB::raw('YEAR(outcome_date)'))
            ->get();

        return view('home', [
            'income_year' => (sizeof($incomeOfYear) == 0) ?  $defaultResponse : $incomeOfYear[0],
            'outcome_year' => (sizeof($outcomeOfYear) == 0) ?  $defaultResponse : $outcomeOfYear[0],
            'enter_year' => (sizeof($congregationEnters) == 0) ?  $defaultResponse : $congregationEnters[0],
            'out_year' => (sizeof($congregationOuts) == 0) ?  $defaultResponse : $congregationOuts[0],
        ]);
    }

    public function getIncomeOutcome()
    {
        $report = DB::select('CALL GenerateIncomeOutcome()');

        return response()->json($report);
    }
}
