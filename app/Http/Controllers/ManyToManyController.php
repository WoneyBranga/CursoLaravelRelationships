<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::where('name', 'SÃO PAULO')->get()->first();
        echo $city->name . PHP_EOL;

        $companies = $city->companies;
        foreach ($companies as $company) {
            echo $company->name . PHP_EOL;
        }
    }


    function ManyToManyInverse()
    {
        $company = Company::where('name', 'SuporteTop')->get()->first();
        echo 'Empresa: ' . $company->name . PHP_EOL;

        $cities = $company->cities;
        foreach ($cities as $city) {
            echo ' - Cidades: ' . $city->name . PHP_EOL;
        }
    }

    public function manyToManyInsert()
    {
        $dataForm = [ 1, 2, 3 ];

        $company = Company::find(2);
        echo 'Empresa: ' . $company->name . PHP_EOL;

        #$company->cities()->attach($dataForm);
        # problema do attach é que podemos ter valor repetido...

        $company->cities()->sync($dataForm);
        # o sync sincroniza dados com informados, se tinhamos opções
        # alem das aqui editadas, estas sumirao.. vale o q sincronizar..

        $company->cities()->detach(1);
        # remove um item/array de itens


        $cities = $company->cities;
        foreach ($cities as $city) {
            echo ' - Cidades: ' . $city->name . PHP_EOL;
        }
    }

}
