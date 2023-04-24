<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'vol', 'beertype_id'];

    public function beertype () 
    {
        return $this->belongsTo(Beertype::class);
    }

    public function breweries () {

        return $this->belongsToMany(Brewery::class);
    }

}
