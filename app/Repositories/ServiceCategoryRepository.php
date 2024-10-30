<?php

namespace App\Repositories;

use App\Models\ServiceCategory;
use App\Repositories\BaseRepository;

/**
 * Class ServiceCategoryRepository
 * @package App\Repositories
 * @version March 31, 2024, 2:03 pm UTC
*/

class ServiceCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return ServiceCategory::class;
    }
}
