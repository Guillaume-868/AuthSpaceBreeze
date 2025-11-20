<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['planet_id', 'path', 'disk', 'role'];

    public function planet()
    {
        // Une image appartient à une planête

        return $this->belongsTo(Planet::class);
    }
}
