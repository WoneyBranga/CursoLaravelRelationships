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
}
