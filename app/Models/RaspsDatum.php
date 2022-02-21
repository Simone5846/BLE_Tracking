<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Seld\PharUtils\Timestamps;

class RaspsDatum extends Model
{
    use HasFactory;

    protected $table = 'rasps_data';

    protected $primaryKey = 'id';

    protected $fillable = ['mac', 'rssi'];

    protected $dates = ['created_at'];

    public function rasps_session(): BelongsTo
    {
        return $this->belongsTo(RaspsSession::class, 'rasps_session_id');
    }
}
