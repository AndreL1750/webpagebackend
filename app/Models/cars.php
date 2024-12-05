<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'Year',
        'Brand',
        'Model',
        'Sub-Model',
        'Version',
        'Doors',
        'Color',
        'Traction',
        'Cubic-Capacity',
        'Power',
        'Gearbox',
        'Fuel',
        'Segment',
        'Color-Type',
        'Class',
        'Plate'
    ];

    protected $table = "cars";
}
