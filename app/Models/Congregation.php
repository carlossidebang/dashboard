<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Congregation
 * @package App\Models
 * @version March 31, 2024, 2:21 pm UTC
 *
 * @property string $name
 * @property string $place_of_birth
 * @property string $birthday_date
 * @property string $address
 * @property string $gender
 * @property string $occupation
 */
class Congregation extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'congregations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'place_of_birth',
        'birthday_date',
        'address',
        'gender',
        'occupation',
        'death_date',
        'out_date',
        'enter_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'place_of_birth' => 'string',
        'birthday_date' => 'date:Y-m-d',
        'address' => 'string',
        'gender' => 'string',
        'occupation' => 'string',
        'death_date' => 'date:Y-m-d',
        'out_date' => 'date:Y-m-d',
        'enter_date' => 'date:Y-m-d'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|min:3|max:150',
        'place_of_birth' => 'required|string|min:3|max:50',
        'birthday_date' => 'required',
        'address' => 'required|string|min:10',
        'gender' => 'required',
        'occupation' => 'required|string|min:3|max:50'
    ];

    
}
