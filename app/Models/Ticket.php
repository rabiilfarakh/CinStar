<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'film_id',
        'code',
        'type',
    ];
    use HasFactory;
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
