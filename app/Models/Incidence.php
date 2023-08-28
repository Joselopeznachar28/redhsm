<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidence extends Model
{
    use HasFactory;

    protected $fillable = [
        'incidence',
    ];

    public function responses(){
        return $this->hasMany(ResponseIncidence::class);
    }

}
