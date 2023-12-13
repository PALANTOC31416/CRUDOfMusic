<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    use HasFactory;

    protected $table = 'albums';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'author',
        'genre_id'
    ];

    public static function getAlbums() {
        return Albums::select(
            'albums.id',
            'albums.name',
            'albums.author',
            'genres.name'
        )
            ->join('genres', 'albums.genre_id', '=', 'genres.id')
            ->get();
    }

    public function genres() {
        return $this->belongsTo(Genres::class, 'genre_id');
    }
}
