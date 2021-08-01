<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\State;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * METODO "location" para buscas todas localizações dos pais
     */
    public function location(){
        /**
         * Caso tenho mudado o nome dos campos nas tabelas, deve usar esta sequencia
         * return $this->hasOne(Location::class, 
         *      'id_da_tabela_location_relacionado_com_a_tabela_country', 
         *      'id_da_tabela_country');
        */

        /** 
         * Pradrão do Laravel, já reconhese este caminho com estes caminhos
         * não precissa colocar os campos 'country_id', 'id', mas se foi presonalizado 
         * no banco de dados de forma diferente sera preciso colocar os campos corretos
         * 'country_id' = chave estrangeira da tabela
         * 'id' = chave primaria da tabela vinculada
         * return $this->hasOne(Location::class, 'country_id', 'id');
        */
        //return $this->hasOne(Location::class, 'country_id', 'id');
        return $this->hasOne(Location::class);
    }

    /**
     * METODO "states" para buscas todos estados vinculado ao pais
     */
    public function states(){

        /** 
         * Pradrão do Laravel, já reconhese este caminho com estes caminhos
         * não precissa colocar os campos 'country_id', 'id', mas se foi presonalizado 
         * no banco de dados de forma diferente sera preciso colocar os campos corretos
         * 'country_id' = chave estrangeira da tabela
         * 'id' = chave primaria da tabela vinculada
         * return $this->hasMany(State::class, 'country_id', 'id');
        */
        //return $this->hasMany(State::class, 'country_id', 'id');
        return $this->hasMany(State::class);
    }

    /**
     * METODO "cities" para buaca todas as cidades vinculadas ao pais sem precisar buscar os estados
     */
    public function cities(){

        return $this->hasManyThrough(City::class, State::class);
    }

    /**
     * Logica criada para retonar os comentarios Polymorphic
     * "Comment::class" e a Model que possui Polymorphic
     * "commentable" e o metodo criado na Model "Comment" 
     */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }
}
