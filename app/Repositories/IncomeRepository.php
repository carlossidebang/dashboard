<?php

namespace App\Repositories;

use App\Models\Income;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class IncomeRepository
 * @package App\Repositories
 * @version March 31, 2024, 2:07 pm UTC
*/

class IncomeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'income_date',
        'nominal',
        'service_category_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    public function getIncomeMonthlyReport(Request $request)
    {
        $startDate = $request->input('start_date', '2018-01-01');
        $endDate = $request->input('end_date', '2018-12-31');

        $report = [];

        $result = DB::select('CALL GenerateIncomeMonthlyReport(?, ?)', [$startDate, $endDate]);

        $report['year'] = $result[0]->report_year;
        $report['data'] = [];

        foreach ($result as $data) {
            $report['data'][] = [
                'month' => $data->report_month,
                'total_income' => (int) $data->total_income
            ];
        }

        return $report;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Income::class;
    }
}
