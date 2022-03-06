<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function aplications()
    {
        return $this->hasMany(Aplication::class);
    }
}
