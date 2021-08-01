<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne(){
        $country = Country::where('id', '2')->get()->first();
        echo $country->name;

        $location = $country->location()->get()->first();
        echo "<hr>Latitude: {$location->latitude}<br>";
        echo "Longitude: {$location->longitude}<br>";
        dd("$location->latitude");


    }

    public function oneToOneInverse(){
        $latitude = 123;
        $longitude = 321;

        $location = Location::where('latitude', $latitude)
                    ->where('longitude', $longitude)
                    ->get()
                    ->first();
        
        ///*Resgatar em forma como Metodo, com um unico resultado*///
        $country =$location->country()->get()->first();
        echo $country->name;

        //echo $location->id;

        /*Resgatar em forma como atributo*/
        //$country =$location->country;
    }

    public function oneToOneShow($id){
        //dd($id);
        $country = Country::find($id);
        dd($country->name);

    }

    public function oneToOneInsert(){
        $dataForm = [
            'name' => 'Japão',
            'latitude' => '01  ',
            'longitude' => '01',
        ];

        /* Cadastra o Pais com latitude e longitude */
        $country = Country::create($dataForm);

        /** Cadastrar somente a latitude e longitude 
         * para um pais que não possui, devendo usar 
         * esta estrutura e  comentar o Cadastro de Pais
        */
        //$country = Country::where('name', 'Alemanha')->get()->first();

        //* Cadastra o pais com latitude e longitude *// 
        /*
        $location = new Location;
        $location->latitude = $dataForm['latitude'];
        $location->longitude = $dataForm['longitude'];
        $location->country_id = $country->id;
        $saveLocation = $location->save();
        */

        //* Cadastra o pais com latitude e longitude, usando o METODO 'location' em Country.php, este metodo economiza codigo*// 
        $location = $country->location()->create($dataForm);
        var_dump($location);

        

    }

}
