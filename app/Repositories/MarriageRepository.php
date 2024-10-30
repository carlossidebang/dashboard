<?php

namespace App\Repositories;

use App\Models\Marriage;
use App\Repositories\BaseRepository;

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
}
