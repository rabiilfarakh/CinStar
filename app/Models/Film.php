<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use laravel\Scout\Searchable;

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
        'salle_id',
        'rating',
        'Poster',
        'length',
        'presentation_time',
        'description',
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


    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'genre' => $this->genre,
            'acteur' => $this->acteur,
        ];
    }
}

