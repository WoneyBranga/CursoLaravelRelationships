<?php

/**
 * One To One
 */
Route::get('one-to-one', 'OneToOneController@oneToOne');
Route::get('one-to-one-inverse', 'OneToOneController@oneToOneInverse');
Route::get('one-to-one-insert', 'OneToOneController@oneToOneInsert');

/**
 * One To Many
 */
Route::get('one-to-many', 'OneToManyController@oneToMany');


Route::get('/', function () {
    return view('welcome');
});
