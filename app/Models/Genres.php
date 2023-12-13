<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $table = 'genres';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name'
    ];

    public static function getGenres() {
        return Genres::select()->get();
    }
}
