<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumsRequest;
use App\Http\Requests\GenresRequest;
use App\Models\Albums;
use App\Models\Genres;
use Illuminate\Http\Request;

class PageController extends Controller
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
             'name' => $request->validated()['name'],
             'author' => $request->validated()['author'],
             'genre_id' => $request->input('genres')
         ];

         if(Albums::create($dataAlbum)) {
             return redirect('/')->with('success', 'Se agrego al album');
         }
        return redirect('/')->with('danger', 'Ocurrio un error ');
    }

    public function addGenres(GenresRequest $request)
    {
         $dataGenres = [
             'name' => $request->validated()['name']
         ];

         if(Genres::create($dataGenres)) {
             return redirect('/')->with('success', 'Se agrego un nuevo genero');
         }
        return redirect('/')->with('danger', 'Ocurrio un error ');
    }

    public function deleteOfAlbum($id) {
        try {
            //Buscamos la oferta por medio de su id
            $albumSelected = Albums::find($id);
            // eliminamos la oferta
            $albumSelected->delete();
            return redirect('/')->with('success', 'Se elimino el ambul correctamente');
        } catch (\Exception $e) {
            // Manejar cualquier error que pueda ocurrir durante la eliminación
            return redirect('/')->with('danger', 'Ocurrio un error al eminiar el album');
        }
    }
}
