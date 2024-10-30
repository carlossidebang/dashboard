<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Marriage
 * @package App\Models
 * @version March 31, 2024, 1:43 pm UTC
 *
 * @property string $husband_name
 * @property string $wife_name
 * @property string $marriage_date
 */
class Marriage extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'marriages';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'husband_name',
        'wife_name',
        'marriage_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'husband_name' => 'string',
        'wife_name' => 'string',
        'marriage_date' => 'date:d-m-Y'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'husband_name' => 'required',
        'wife_name' => 'required|string|min:3|max:150',
        'marriage_date' => 'required'
    ];

    
}
