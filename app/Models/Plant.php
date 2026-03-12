<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Plant extends Model
{
    protected $fillable = [
        'name', 'local_name', 'scientific_name', 
        'description', 'region', 'safety_warning', 'image', 'price', 'plant_id'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($plant) {
            if (empty($plant->plant_id)) {
                $lastId = \DB::table('plants')->max('id') ?? 0;
                $plant->plant_id = 'PLANT-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function uses()
    {
        return $this->hasMany(PlantUse::class);
    }
}
