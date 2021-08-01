<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'initials', 'country_id'];

    /** 
    * Pradrão do Laravel, já reconhese este caminho com estes caminhos
    * não precissa colocar os campos 'country_id', 'id', mas se foi presonalizado 
    * no banco de dados de forma diferente sera preciso colocar os campos corretos
    * 'country_id' = chave estrangeira da tabela
    * 'id' = chave primaria da tabela vinculada
    * eturn $this->belongsTo(Country::class, 'country_id', 'id');
    */
    public function country(){
        //return $this->belongsTo(Country::class, 'country_id', 'id');
        return $this->belongsTo(Country::class);
    }


    public function cities(){
        return $this->hasMany(City::class);
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
