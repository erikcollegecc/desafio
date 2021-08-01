<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdSimples extends Model
{
    use HasFactory;

    protected $table = 'prod_simples';

    protected $fillable = [ 
        'produtos_id', 
        'max_price', 
        'min_price'
    ];

    public function produto(){
        return $this->belongsTo(Produtos::class);
    }

}
