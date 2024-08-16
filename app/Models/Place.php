<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $table = 'table_place';

    protected $fillable = ['place', 'latitude', 'longitude', 'photo'];

    // Additional model logic, relationships, etc., can be added here

    public function setImageDataAttribute($value)
    {
        $this->attributes['photo'] = base_encode64($value);
    }
}
