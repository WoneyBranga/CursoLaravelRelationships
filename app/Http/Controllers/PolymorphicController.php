<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        // $city = City::where('name', 'PALHOÇA')->get()->first();
        // echo 'Cidade: ' . $city->name . PHP_EOL;

        // $comments = $city->comments()->get();

        // foreach ($comments as $comment) {
        //     echo "  - Comment: " . $comment->description . PHP_EOL;
        // }
###
        // $state = State::where('initials', 'SC')->get()->first();
        // echo 'Estado: ' . $state->name . PHP_EOL;

        // $comments = $state->comments()->get();

        // foreach ($comments as $comment) {
        //     echo "  - Comment: " . $comment->description . PHP_EOL;
        // }

        $country = Country::where('name', 'Brasil')->get()->first();
        echo 'País: ' . $country->name . PHP_EOL;

        $comments = $country->comments()->get();

        foreach ($comments as $comment) {
            echo "  - Comment: " . $comment->description . PHP_EOL;
        }


    }

    public function polymorphicInsert()
    {
        // $city = City::where('name', 'PALHOÇA')->get()->first();
        // echo 'Cidade: ' . $city->name;

        // $comment = $city->comments()->create([
        //     'description' => "new comment {$city->name} ".date('YmdHis'),
        // ]);
###
        // $state = State::where('initials', 'SC')->get()->first();
        // echo 'Cidade: ' . $state->name;

        // $comment = $state->comments()->create([
        //     'description' => "new comment {$state->name} ".date('YmdHis'),
        // ]);
###
        $country = Country::where('name', 'Brasil')->get()->first();
        echo 'Cidade: ' . $country->name;

        $comment = $country->comments()->create([
            'description' => "new comment {$country->name} ".date('YmdHis'),
        ]);

        dd($comment);

    }
}
