<?php

namespace App\Repositories;

use App\Models\Outcome;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class OutcomeRepository
 * @package App\Repositories
 * @version March 31, 2024, 2:09 pm UTC
*/

class OutcomeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nominal',
        'outcome_date',
        'description'
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

    public function getOutcomeMonthlyReport(Request $request)
    {
        $startDate = $request->input('start_date', '2018-01-01');
        $endDate = $request->input('end_date', '2018-12-31');

        $report = [];

        $result = DB::select('CALL GenerateOutcomeMonthlyReport(?, ?)', [$startDate, $endDate]);

        $report['year'] = $result[0]->report_year;
        $report['data'] = [];

        foreach ($result as $data) {
            $report['data'][] = [
                'month' => $data->report_month,
                'total_outcome' => (int) $data->total_outcome
            ];
        }

        return $report;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Outcome::class;
    }
}
