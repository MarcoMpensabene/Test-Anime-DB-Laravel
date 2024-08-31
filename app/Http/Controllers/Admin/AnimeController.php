<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use Illuminate\Http\Request;
use stdClass;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animes = Anime::paginate(10);
        return view("admin.animes.index", compact("animes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anime = new Anime();
        return view("admin.animes.create", compact('anime'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newAnime = Anime::create($data);
        return redirect()->route('admin.animes.show', $newAnime);
    }

    /**
     * Display the specified resource.
     */
    public function show(Anime $anime)
    {

        return view('admin.animes.show', compact('anime'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anime $anime)
    {
        return view('admin.animes.edit', compact('anime'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anime $anime)
    {
        $data = $request->all();
        $anime->update($data);
        return redirect()->route('admin.animes.show', $anime)->with('message', $anime->title . " Has Been Edited");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anime $anime)
    {
        $anime->delete();

        return redirect()->route('admin.animes.index')->with('message', "N:" . $anime->id . " " . $anime->title . " Has Been Deleted");
    }
}
