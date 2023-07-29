<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'torre_id',
    ];

    public function torre(){
        return $this->belongsTo(Torre::class);
    }

    public function cdds(){
        return $this->hasMany(CDD::class);
    }
}
