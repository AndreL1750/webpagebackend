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
        'SubModel',
        'Version',
        'Doors',
        'Color',
        'Traction',
        'CubicCapacity',
        'Power',
        'Gearbox',
        'Fuel',
        'Segment',
        'ColorType',
        'Class',
        'Plate'
    ];

    protected $connection = 'mysql';
    protected $table = "cars";
}
