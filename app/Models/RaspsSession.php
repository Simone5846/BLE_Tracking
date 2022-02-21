<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Seld\PharUtils\Timestamps;

/**
 * @property int $id
 * @property int device_id
 * @property string rssi
 * @property \Carbon\Carbon $started_at
 * @property \Carbon\Carbon|null $ended_at
 * @property \Carbon\Carbon|null $created_at
 * @property-read \App\Models\RaspsDatum[]|\Illuminate\Support\Collection $rasps_data
 */
class RaspsSession extends Model
{
    use HasFactory;

    protected $table = 'rasps_sessions';

    protected $primaryKey = 'id';

    protected $fillable = ['device_id', 'started_at', 'ended_at'];

    protected $dates = ['started_at', 'ended_at', 'created_at'];

    public function rasps_data(): HasMany
    {
        return $this->hasMany(RaspsDatum::class, 'rasps_session_id');
    }
}
