<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;


class OneToManyController extends Controller
{
    public function oneToMany(){
        /**
         * Busca mais usada quando possui somente um unico resultado
         */
        //$country = Country::where('name', 'Brasil')->get()->first();


        //Busca mais de país com a letra 'a'
        $keySearch = 'a';

        //Gasta mais recurso
        //$countries = Country::where('name', 'LIKE', "%{$keySearch}%")->get();

        /**
         * Gasta menos recurso, buscando tudo vinculado ao pais
         * Usa o metado 'states' que esta em Country.php
         */
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();

        //dd($country->name);
        //dd($countries);


        foreach($countries as $country){
            
            echo "<b>$country->name</b>";

            /**
             * pode ser feito usando o formato de METODO
             * $states = $country->states()->get();
             * Pode usar tambem para refinar a busca
             * $states = $country->states()->where('initials', LIKE', 'MG')->get();
             */
            //$states = $country->states()->where('initials', 'LIKE', 'MG')->get();
            //$states = $country->states()->get();
            $states = $country->states;


            foreach ($states as $state){
                echo "<br>{$state->name} - {$state->initials}";
            }

            echo '<hr>';

        }

    }

    public function ManyToOne(){
        $stateName = 'São Paulo';
        $state = State::where('name', $stateName)->get()->first();
        echo "<b>{$state->name}</b>";
        

        /**
         * Metodo 'country' puxando da função State.php 
         */
        $country = $state->country;
        echo "<br><b>País: {$country->name}</b>";
    }


    public function cities(){
        /**
         * Busca mais usada quando possui somente um unico resultado
         */
        //$country = Country::where('name', 'Brasil')->get()->first();


        //Busca mais de país com a letra 'a'
        $keySearch = 'a';

        //Gasta mais recurso
        //$countries = Country::where('name', 'LIKE', "%{$keySearch}%")->get();

        /**
         * Gasta menos recurso, buscando tudo vinculado ao pais
         * Usa o metado 'states' que esta em Country.php
         */
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();

        //dd($country->name);
        //dd($countries);


        foreach($countries as $country){
            
            echo "<b>$country->name</b>";

            /**
             * pode ser feito usando o formato de METODO
             * $states = $country->states()->get();
             * Pode usar tambem para refinar a busca
             * $states = $country->states()->where('initials', LIKE', 'MG')->get();
             */
            //$states = $country->states()->where('initials', 'LIKE', 'MG')->get();
            //$states = $country->states()->get();
            $states = $country->states;


            foreach ($states as $state){
                echo "<br>{$state->name} - {$state->initials}<br>";

                /**
                 * Esta chamando 'cities' em forma de atributo do State.php
                 */
                foreach ($state->cities as $city){
                    echo "{$city->name}, ";

                }
            }

            echo '<hr>';

        }

    }

    public function add(){

        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA',
        ];

        $country = Country::find(1);

        $insertState = $country->states()->create($dataForm);
        var_dump($insertState->name);;
    }

    public function addtwo(){

        $dataForm = [
            'name' => 'Bahia',
            'initials' => 'BA',
            'country_id' => '1'
        ];

        $insertState = State::create($dataForm);
        var_dump($insertState->name);;
    }

    /**
     * Usado para buscar todos os dados de uma de tabelas em cascata
     */
    public function HasThrough(){

        $country = Country::find(1);
        echo "<b>{$country->name}:</b> <br>";

        $cities = $country->cities;

        foreach ($cities as $city){
            echo "{$city->name}, ";
        }

        echo "<br>Total de cidades: {$cities->count()}";

    }

}