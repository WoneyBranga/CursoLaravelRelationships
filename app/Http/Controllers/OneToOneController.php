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

    public function oneToOneInsert()
    {
        $dataForm = [
            'name' => 'Uruguai',
            'latitude' => 444,
            'longitude' => 555,
        ];

        $country = Country::create($dataForm);

        # Podemos em no lugar de criar uma nova country, recuperar uma exsitente para carregar location...
        # Ex:
        # $country = Country::where('name', 'Brasil')->get()->first();

        # Modo 00 - create location NAO FUNFOU (SQLSTATE[HY000]: General error: 1364 Field 'country_id' doesn't have a default value (SQL: insert into `locations` (`latitude`, `longitude`, `updated_at`, `created_at`) values (333, 444, 2020-01-23 20:34:12, 2020-01-23 20:34:12)))
        #$dataForm['country_id'] = $country->id;
        #$location = Location::create($dataForm);

        ## Modo 01 - create location
        #$location = new Location;
        #$location->latitude = $dataForm['latitude'];
        #$location->longitude = $dataForm['longitude'];
        #$location->country_id = $country->id;
        #$saveLocation = $location->save();

        # Modo 02
        $location = $country->location()->create($dataForm);


    }
}
