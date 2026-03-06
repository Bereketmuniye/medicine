<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlantUse extends Model
{
    protected $fillable = [
        'plant_id', 'disease', 'preparation', 'dosage', 'warning'
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}
