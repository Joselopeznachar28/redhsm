<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDD extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'torre_id',
        'floor_id',
    ];

    public function torre(){
        return $this->belongsTo(Torre::class);
    }

    public function floor(){
        return $this->belongsTo(Floor::class);
    }

    public function devices(){
        return $this->hasMany(Device::class);
    }
}
