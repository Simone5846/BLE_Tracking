<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $username
 * @property string $mac_addr
 * @property-read \App\Models\RaspsSession[]|\Illuminate\Support\Collection $rasps_sessions
 */
class Device extends Model
{
    use HasFactory;

     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'devices';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'mac_addr'];
    protected $time;

    public function rasps_sessions(): HasMany
    {
        return $this->hasMany(RaspsSession::class, 'device_id');
    }
}
