<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Location;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        // $country = Country::where('name', 'Brasil')->get()->first();
        // echo $country->name . PHP_EOL;

        // $states = $country->states;
        // # podemos chamar no formato de metodo tambem...
        // # ex:
        // # $states = $country->states()->get();
        // # vantagem é que podemos incluir condições. vamos filtrar SC...
        // # ex:
        // # $states = $country->states()->where('initials','SC')->get();
        // # $states = $country->states()->where('initials','NOT LIKE','sc')->get();

        // foreach ($states as $state) {
            //     echo $state->initials . ' - ' . $state->name . PHP_EOL;
            // }


            $countries = Country::where('name', 'LIKE', '%a%')->with('states')->get();
            foreach ($countries as $country) {
                echo '-----------' . PHP_EOL;
                echo $country->name . PHP_EOL;
                echo '-----------' . PHP_EOL;

                $states = $country->states;
                foreach ($states as $state) {
                    echo $state->initials . ' - ' . $state->name . PHP_EOL;
                }
            }
        }

        public function manyToOne()
        {
            $stateName = 'São Paulo';
            $state = State::where('name', $stateName)->get()->first();

            echo 'Estado: ' . $state->name . PHP_EOL;

            $country = $state->country;
            #$country = $state->country()->get()->first();

            echo 'Pais: ' . $country->name . PHP_EOL;

        }

    }
