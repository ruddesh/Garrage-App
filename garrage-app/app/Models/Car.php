<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_brand', 'vehicle_name', 'manufacturing_year'];
    protected $table = 'cars';
}
