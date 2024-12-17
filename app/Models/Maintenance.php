<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'maintenancedbs';

    protected $fillable = [
        'Plate',
        'Name',
        'Description'
    ];
}
