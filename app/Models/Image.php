<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'film_id',
        'image',
    ];
    
    use HasFactory;
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
