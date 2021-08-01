<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdDigital extends Model
{
    use HasFactory;

    protected $table = 'prod_digitals';

    protected $fillable = [ 
        'name_digi', 
        'id_simples', 
        'prod_dital'
    ];
}
