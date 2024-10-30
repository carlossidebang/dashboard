<?php

namespace App\Repositories;

use App\Models\AdultBaptism;
use App\Repositories\BaseRepository;

/**
 * Class AdultBaptismRepository
 * @package App\Repositories
 * @version March 31, 2024, 2:15 pm UTC
*/

class AdultBaptismRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'adult_baptism_date'
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
        return AdultBaptism::class;
    }
}
