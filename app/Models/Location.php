<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = [
        'nama_lokasi',
    ];

    public function events()
    {
        return $this->hasMany(Event::class, 'location_id');
    }
}