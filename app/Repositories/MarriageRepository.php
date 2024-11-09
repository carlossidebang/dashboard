<?php

namespace App\Repositories;

use App\Models\Marriage;
use App\Repositories\BaseRepository;
use DB;

/**
 * Class MarriageRepository
 * @package App\Repositories
 * @version March 31, 2024, 1:43 pm UTC
*/

class MarriageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'husband_name',
        'wife_name',
        'marriage_date'
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

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Marriage::class;
    }

    public function getUnmarried(string $gender)
    {
        if($gender == 'pria') {
            return DB::table('congregations as c')
                ->leftJoin('marriages as m', 'c.name', '=', 'm.husband_name')
                ->where('c.gender', 'pria')
                ->whereNull('m.husband_name')
                ->select('c.name')
                ->get();
        }
        // wanita
        return DB::table('congregations as c')
            ->leftJoin('marriages as m', 'c.name', '=', 'm.wife_name')
            ->where('c.gender', 'wanita')
            ->whereNull('m.wife_name')
            ->select('c.name')
            ->get();
    }
}
