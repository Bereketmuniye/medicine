<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name', 'local_name', 'scientific_name', 
        'description', 'region', 'safety_warning', 'image'
    ];

    public function uses()
    {
        return $this->hasMany(PlantUse::class);
    }
}
