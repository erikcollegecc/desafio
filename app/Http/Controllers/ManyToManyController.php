<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany(){

        $city = City::where('id', '6')->get()->first();
        echo "<b>{$city->name}: </b><br>";

        $companies  = $city->companies;

        foreach($companies as $company){
            echo "{$company->name}, ";
        }

    }

    public function manyToManyInverse(){

        $company = Company::where('id', '1')->get()->first();
        echo "<b>{$company->name}: </b><br>";

        $cities  = $company->cities;

        foreach($cities as $city){
            echo "{$city->name}, ";
        }

    }

    public function manyToManyInsert(){

        $dataForm = [3,4,5];

        $company = Company::find(1);
        echo "<b>{$company->name}: </b><br>";

        /**
         * Adiciona quantas vezes forem necessarias, 
         * para não repetir preicasr por uma regra de verificação
         */
        //$company->cities()->attach($dataForm);
        
        /**
         * Adiciona mas realiza automaticamente a verificação
         * se ja possui o cadastras avitando dupicidades
         */
        $company->cities()->sync($dataForm);

        /**
         * Utilizado para remoção de dados relacionado no 
         * "$dataForm"
         */
        //$company->cities()->detach($dataForm);


        $cities  = $company->cities;

        foreach($cities as $city){
            echo "{$city->name}, ";
        }

    }
}
