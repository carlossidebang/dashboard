<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Outcome
 * @package App\Models
 * @version March 31, 2024, 2:09 pm UTC
 *
 * @property integer $nominal
 * @property string $outcome_date
 * @property string $description
 */
class Outcome extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'outcomes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nominal',
        'outcome_date',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nominal' => 'integer',
        'outcome_date' => 'date:Y-m-d',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nominal' => 'required',
        'outcome_date' => 'required',
        'description' => 'required|string|min:10|max:100'
    ];

    
}
