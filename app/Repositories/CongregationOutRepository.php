<?php

namespace App\Repositories;

use App\Models\CongregationOut;
use App\Repositories\BaseRepository;

/**
 * Class CongregationOutRepository
 * @package App\Repositories
 * @version April 30, 2024, 4:56 pm UTC
*/

class CongregationOutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return CongregationOut::class;
    }
}
