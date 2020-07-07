<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App\Models
 * @property string $name
 */
class City extends Model
{
    /**
     * @var string[]
     */
    public $fillable = [
        'name',
    ];
}
