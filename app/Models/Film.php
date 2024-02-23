<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'title',
        'year',
        'runtime',
        'released',
        'Awards',
        'genre',
        'acteur',
        'date',
        'rating',
        'Poster',
    ];
    use HasFactory;

    public function salle()
    {
        return $this->belongsTo(Salle::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}

