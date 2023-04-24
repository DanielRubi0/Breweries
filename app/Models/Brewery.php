<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'score',
        'user_id'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function beers (){
        return $this->belongsToMany (Beer::class);
    }
}
