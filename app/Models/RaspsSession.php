<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Seld\PharUtils\Timestamps;

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
