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

        public function oneToManyTwo()
        {

            $countries = Country::where('name', 'LIKE', '%a%')->with('states')->get();
            foreach ($countries as $country) {
                echo '-----------' . PHP_EOL;
                echo $country->name . PHP_EOL;
                echo '-----------' . PHP_EOL;

                $states = $country->states;
                foreach ($states as $state) {
                    echo $state->initials . ' - ' . $state->name . PHP_EOL;

                    foreach ($state->cities as $city) {
                        echo ' >> ' . $city->name . PHP_EOL;
                    }
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

        public function oneToManyInsert()
        {
            $dataForm = [
                'name' => 'Bahia',
                'initials' => 'BA',
            ];

            $country = Country::find(1);

            $insertState = $country->states()->create($dataForm);
            dd($insertState);
        }

        public function oneToManyInsertTwo()
        {
            $dataForm = [
                'name' => 'Acre',
                'initials' => 'AC',
                'country_id' => 1,
            ];

            $insertState = State::create($dataForm);
            dd($insertState);
        }

        public function hasManyThrough()
        {
            $country = Country::find(1);

            echo 'País: ' . $country->name . PHP_EOL;

            $cities = $country->cities;

            foreach ($cities as $city) {
                echo ' - Cidade: ' . $city->name . PHP_EOL;
            }

            echo 'Total Cidades: ' . $cities->count() . PHP_EOL;
        }
    }
