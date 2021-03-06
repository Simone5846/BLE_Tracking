<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Seld\PharUtils\Timestamps;

class DataFromRasp extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = ['MAC', 'RSSI'];

}
