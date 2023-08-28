<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'mark',
        'model',
        'user_admin',
        'password_admin',
        'name',
        'type',
        'cdd_id',
    ];

    public function cdd(){
        return $this->belongsTo(CDD::class);
    }

    public function ports(){
        return $this->hasMany(Port::class);
    }

    public function incidences(){
        return $this->hasMany(Incidence::class);
    }
}
