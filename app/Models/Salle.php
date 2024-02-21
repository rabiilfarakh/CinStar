<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    protected $fillable = [
        'name',
        'taille',
        'shema',
    ];
    use HasFactory;
    public function films()
    {
        return $this->hasMany(Film::class);
    }
}
