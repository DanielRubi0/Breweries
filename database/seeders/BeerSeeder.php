<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Beer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $beer = new Beer();
        $beer->fill(['name' => "Alhambra Reserva 1925", 'vol' =>'6.4', 'type' => 'Pale Lager']);
        $beer->saveOrFail();

        $beer = new Beer();
        $beer->fill(['name' => "El Águila", 'vol' =>'5.5', 'type' => 'Lager']);
        $beer->saveOrFail();

    }
}
