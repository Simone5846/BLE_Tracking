<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Seld\PharUtils\Timestamps;

/**
 * @property int $id
 * @property int rasps_session_id
 * @property string rssi
 * @property \Carbon\Carbon|null $created_at
 * @property-read \App\Models\RaspsSession $rasps_session
 */
class RaspsDatum extends Model
{
    use HasFactory;

    protected $table = 'rasps_data';
    protected $fillable = ['mac', 'rssi'];
    protected $dates = ['created_at'];

    public function rasps_session(): BelongsTo
    {
        return $this->belongsTo(RaspsSession::class, 'rasps_session_id');
    }
}
