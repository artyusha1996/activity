<?php

namespace App\Models;

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
