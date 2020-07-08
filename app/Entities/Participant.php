<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Class Participant
 * @package App\Models
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 */
class Participant extends Model
{
    use Notifiable;
    /**
     * @var string[]
     */
    public $fillable = [
        'first_name',
        'last_name',
        'email',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_has_participants');
    }
}
