<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Income
 * @package App\Models
 * @version March 31, 2024, 2:07 pm UTC
 *
 * @property string $income_date
 * @property integer $nominal
 * @property integer $service_category_id
 */
class Income extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'incomes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'income_date',
        'nominal',
        'service_category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'income_date' => 'date:Y-m-d',
        'nominal' => 'integer',
        'service_category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'income_date' => 'required',
        'nominal' => 'required',
        'service_category_id' => 'required'
    ];

    
}
