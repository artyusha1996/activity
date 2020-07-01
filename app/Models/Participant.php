<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Participant
 * @package App\Models
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 */
class Participant extends Model
{
    /**
     * @var string[]
     */
    public $fillable = [
        'first_name',
        'last_name',
        'email',
    ];
}
