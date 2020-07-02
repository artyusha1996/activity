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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'activity_has_participant');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
