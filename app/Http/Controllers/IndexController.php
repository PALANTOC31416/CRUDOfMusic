<?php

namespace App\Http\Controllers;
use App\Models\Albums;
use App\Models\Genres;
use App\Http\Requests\AlbumsRequest;
use App\Http\Requests\GenresRequest;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show() {
        $albums = Albums::getAlbums();
        $genres = Genres::getGenres();

        return view('welcome', [
            'albums' => $albums,
            'genres' => $genres
        ]);
    }

    public function addAlbum(AlbumsRequest $request)
    {
         $dataAlbum = [
             'name' => $request->validated()['nombre'],
             'autor' => $request->validated()['autor'],
             'genre_id' => $request->input('genres')
         ];

         if(Albums::create($dataAlbum)) {
             return redirect('/')->with('success', 'Se agrego al album');
         }
        return redirect('/nuevo')->with('danger', 'Ocurrio un error'.$request->input('nombre'));
    }
}
