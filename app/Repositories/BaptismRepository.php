<?php

namespace App\Repositories;

use App\Models\Baptism;
use App\Repositories\BaseRepository;

/**
 * Class BaptismRepository
 * @package App\Repositories
 * @version March 31, 2024, 1:59 pm UTC
*/

class BaptismRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'baptism_date'
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
        return Baptism::class;
    }
}
