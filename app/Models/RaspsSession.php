<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $device_id
 * @property string $rssi
 * @property-read \App\Models\Device $device
 * @property \Carbon\Carbon $started_at
 * @property \Carbon\Carbon|null $ended_at
 * @property \Carbon\Carbon|null $created_at
 * @property-read \App\Models\RaspsDatum[]|\Illuminate\Support\Collection $rasps_data
 */
class RaspsSession extends Model
{
    use HasFactory;

    protected $table = 'rasps_sessions';
    protected $fillable = ['device_id', 'started_at', 'ended_at'];
    protected $dates = ['started_at', 'ended_at', 'created_at'];

    public function rasps_data(): HasMany
    {
        return $this->hasMany(RaspsDatum::class, 'rasps_session_id');
    }

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
}
