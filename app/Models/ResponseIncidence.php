<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseIncidence extends Model
{
    use HasFactory;

    protected $fillable = [
        'response',
        'incidence_id',
        'device_id',
        'done',
    ];

    public function incidence(){
        return $this->belongsTo(Incidence::class);
    }
    public function device(){
        return $this->belongsTo(Device::class);
    }

    
}
