<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Models\Brewery;
use App\Models\Beer;
use App\Http\Requests\BreweryRequest;


class BreweryController extends Controller
{
    //

    public function indexQB () {

        $breweries = DB::table('breweries')->get();
        return view ("breweries.index", compact('breweries'));
    
    }

    public function index (){
        $breweries = Brewery::orderBy('name')->get();
        return view ("breweries.index", compact('breweries'));
    }

    public function showQB ($id) {
        $code = -1;
        $message = "No se ha producido ningún error";

        $brewery = DB::table('breweries')->find($id);
        return view ('breweries.show', compact ('brewery', 'code', 'message'));
    }

    public function show (Brewery $brewery) {
        $code = -1;
        $message = "No se ha producido ningún error";

        return view ('breweries.show', compact ('brewery', 'code', 'message'));
    }

    public function friendly ($name) {
        $code = -1;
        $message = "No se ha producido ningún error";

        $breweries = Brewery::where ('name', $name)->get();

        if (isset ($breweries) && (count ($breweries) > 0)){
            if(count($breweries) > 1) {
                return view ("breweries.index", compact('breweries'));
            }
            else {
                $brewery = $breweries->first();
                return view('breweries.show', compact('brewery', 'code', 'message'));
            }
            
        } else {
            return redirect()->route('breweries.index');
        }

        }

    public function create()
    {
        return view('breweries.create');
    }

    public function storeQB(Request $request) {
        $name = $request->name;
        $description = $request->description;
        $score = $request->score;

        $urlImg = '';
        if ($request->hasFile('image')){
            $urlImg = Storage::url ($request->file('image')->store('public/breweries'));
        }
        
        DB::table('breweries')->insert([
            'name' => $name,
            'description' => $description,
            'score' => $score,
            'img' => $urlImg
        ]);

        return redirect()->route('breweries.index');
    }

    public function store(BreweryRequest $request) {
        $brewery = new Brewery();

        $brewery -> fill($request->validated());


        $urlImg = '';
        if ($request->hasFile('image')){
            $urlImg = Storage::url ($request->file('image')->store('public/breweries'));
            $brewery->img = $urlImg;
        }
        $brewery->user_id = Auth::id();
        $brewery->saveOrFail();
        return redirect()->route('breweries.index');

    }


    public function editQB ($id) {
        $code = -1;
        $message = "No se ha producido ningún error";

        $brewery = DB::table('breweries')->find($id);

        return view ('breweries.edit', compact ('brewery', 'code', 'message'));
    }

    public function edit (Brewery $brewery) {
        $code = -1;
        $message = "No se ha producido ningún error";
        $beers = Beer::orderBy('name')->get();
        return view ('breweries.edit', compact ('brewery', 'beers', 'code', 'message'));
    }

    public function updateQB(Request $request) {
        $name = $request->name;
        $description = $request->description;
        $score = $request->score;
        $id = $request->id;
        $urlImg = '';
        if ($request->hasFile('image')){
            $urlImg = Storage::url ($request->file('image')->store('public/breweries'));
        }
        
        $valores = [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'score' => $score
        ];

        if ($urlImg != '') {
            $valores['img'] = $urlImg;
        }
        DB::table('breweries')->where ('id', $id) ->update ( $valores);
        return redirect()->route('breweries.index');

    }

    public function update(BreweryRequest $request, Brewery $brewery) {
        $brewery->name = $request->name;
        $brewery->description = $request->description;
        $brewery->score = $request->score;

        $urlImg = '';
        if ($request->hasFile('image')){
            $urlImg = Storage::url ($request->file('image')->store('public/breweries'));
            $brewery->img = $urlImg;
        }

        $beers = $request->beers;
        $brewery->beers()->sync($beers);

        $brewery->saveOrFail();
        return redirect()->route('breweries.index');

    }
    public function destroyQB ($id) {
        DB::table('breweries')->delete($id);
        return redirect()->route('breweries.index');
    }

    public function destroy (Brewery $brewery){
        $brewery->deleteOrFail();
        return redirect()->route('breweries.index');
    }
}
