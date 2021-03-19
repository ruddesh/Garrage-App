<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catogory extends Model
{
    protected $fillable = ['vehicle_catogory', 'vehicle_brand', 'vehicle_name', 'manufacturing_year'];

    use HasFactory;
}
