<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer;
use App\Http\Requests\BeerRequest;
use App\Models\Beertype;
use App\Models\Brewery;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $beers = Beer::orderBy("name")->get();
        return view("beers.index", compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $beertypes = Beertype::orderBy ('name')->get();
        $breweries = Brewery::orderBy('name')->get();
        return view("beers.create", compact('beertypes', 'breweries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BeerRequest $request)
    {
        //
        $beer = new Beer();
        $beer->fill($request->validated());
        $breweries = $request->input("breweries");
        
        $beer->saveOrFail();
        $beer->breweries()->attach($breweries);
        return redirect()->route("beers.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function show(Beer $beer)
    {
        //
        return view("beers.show", compact ('beer'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beer)
    {
        //
        $beertypes = Beertype::orderBy ('name')->get();
        $breweries = Brewery::orderBy('name')->get();
        return view("beers.edit", compact ('beer', 'beertypes', 'breweries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function update(BeerRequest $request, Beer $beer)
    {
        //
        $beer->fill($request->validated());
        $breweries = $request->input("breweries");
        $beer->breweries()->sync($breweries);
        $beer->saveOrFail();
        
        return redirect()->route ('beers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beer)
    {
        //
        $beer->breweries()->detach();
        $beer->deleteOrFail();
        return redirect()->route ('beers.index');
    }
}
