<?php

namespace App\Repositories;

use App\Models\Congregation;
use App\Repositories\BaseRepository;

/**
 * Class CongregationRepository
 * @package App\Repositories
 * @version March 31, 2024, 2:21 pm UTC
*/

class CongregationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'place_of_birth',
        'birthday_date',
        'address',
        'gender',
        'occupation'
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
        return Congregation::class;
    }
}
