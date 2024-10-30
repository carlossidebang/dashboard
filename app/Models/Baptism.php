<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Baptism
 * @package App\Models
 * @version March 31, 2024, 1:59 pm UTC
 *
 * @property string $name
 * @property string $baptism_date
 */
class Baptism extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'baptisms';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'baptism_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'baptism_date' => 'date:Y-m-d'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|min:3|max:150',
        'baptism_date' => 'required'
    ];

    
}
