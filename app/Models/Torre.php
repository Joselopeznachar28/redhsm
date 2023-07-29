<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torre extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function floors(){
        return $this->hasMany(Floor::class);
    }

    public function cdds(){
        return $this->hasMany(CDD::class);
    }

}
