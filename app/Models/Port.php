<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode',
        'type',
        'number',
        'name',
        'speed',
        'vlan',
        'device_id',
    ];

    public function device(){
        return $this->belongsTo(Device::class);
    }
}
