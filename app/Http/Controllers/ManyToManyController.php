<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

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
}
