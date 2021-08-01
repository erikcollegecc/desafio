<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Comment;


class PolymorphicController extends Controller
{
    public function Polymorphic(){

        //Listar comentarios das cidaddes
        $city = City::where('id', '6')->get()->first();
        echo "<b>$city->name:</b><br>";

        $comments = $city->comments()->get();

        foreach ($comments as $comment){
            echo "{$comment->description}<hr>";
        }

        //Listar comentarios dos estados
        echo "<br><br><hr>";
        $state = State::where('id', '5')->get()->first();
        echo "<b>$state->name:</b><br>";

        $comments = $state->comments()->get();

        foreach ($comments as $comment){
            echo "{$comment->description}<hr>";
        }

        //Listar comentarios dos paises
        echo "<br><br><hr>";
        $country = Country::where('id', '2')->get()->first();
        echo "<b>$country->name:</b><br>";

        $comments = $country->comments()->get();

        foreach ($comments as $comment){
            echo "{$comment->description}<hr>";
        }

         
    }

    public function PolymorphicInsert(){

        /**
         * para buscar pelo "id" seria melhor usar o camando "find"
         * no lugar de "where"
         */

        //Comentario para cidade
        $city = City::where('id', '6')->get()->first();
        echo $city->name;

        $comment = $city->comments()->create([
            'description' => "New Comment {$city->name} ".date('YmdHis'),
        ]);

        var_dump($comment->description);
        echo "<br><br><hr>";

        //Comentario para Estado
        $state = State::where('id', '5')->get()->first();
        echo $state->name;

        $comment = $state->comments()->create([
            'description' => "New Comment {$state->name} ".date('YmdHis'),
        ]);

        var_dump($comment->description);
        echo "<br><br><hr>";

        //Comentario para Pais
        $country = Country::where('id', '2')->get()->first();
        echo $country->name;

        $comment = $country->comments()->create([
            'description' => "New Comment {$country->name} ".date('YmdHis'),
        ]);

        var_dump($comment->description);
        echo "<br><br><hr>";
    }
}