<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AdultBaptism
 * @package App\Models
 * @version March 31, 2024, 2:15 pm UTC
 *
 * @property string $name
 * @property string $adult_baptism_date
 */
class AdultBaptism extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'adult_baptisms';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'adult_baptism_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'adult_baptism_date' => 'date:Y-m-d'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|min:3|max:150',
        'adult_baptism_date' => 'required'
    ];

    
}
