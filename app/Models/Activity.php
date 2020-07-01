<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * @package App\Models
 * @property integer city_id
 * @property string name
 * @property string starts_at
 */
class Activity extends Model
{
    /**
     * @var string[]
     */
    public $fillable = [
        'city_id',
        'name',
        'starts_at',
    ];

    /**
     * @var string[]
     */
    public $dates = [
        'starts_at',
    ];
}
