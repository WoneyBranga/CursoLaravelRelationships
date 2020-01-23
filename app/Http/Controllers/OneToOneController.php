<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
        # Modo 00 - find pelo ID
        $country = Country::find(1);
        $location = $country->location;

        echo "Country: " . $country->name . PHP_EOL;
        echo "Latitude: " . $location->latitude . PHP_EOL;
        echo "Longitude: " . $location->longitude . PHP_EOL;


        # Modo 01 - pesquisa pelo nome forçando retornar apenas o primeiro.
        $country = Country::where('name', 'Paraguai')->get()->first();
        $location = $country->location;

        echo "Country: " . $country->name . PHP_EOL;
        echo "Latitude: " . $location->latitude . PHP_EOL;
        echo "Longitude: " . $location->longitude . PHP_EOL;

        # Modo 02 - setando location como função, nao atributo...
        $country = Country::where('name', 'Paraguai')->get()->first();
        $location = $country->location()->get()->first();

        echo "Country: " . $country->name . PHP_EOL;
        echo "Latitude: " . $location->latitude . PHP_EOL;
        echo "Longitude: " . $location->longitude . PHP_EOL;
    }

    public function oneToOneInverse()
    {
        # Modo 00 - filtrando por lat/long

        $latitude = 123;
        $longitude = 456;

        $location = Location::where('latitude', $latitude)
                                ->where('longitude', $longitude)
                                ->get()
                                ->first();
        echo $location->id . PHP_EOL;

        # Modo 01 filtrando pelo ID
        $location = Location::find(2);
        echo $location->id . PHP_EOL;

        # Modo 02 - trazendo nome do pais...
        $country = $location->country;
        echo "Location Id: " . $location->id . PHP_EOL;
        echo "Country: " . $country->name . PHP_EOL;

    }
}
