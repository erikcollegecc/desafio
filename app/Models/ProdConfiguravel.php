<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdConfiguravel extends Model
{
    use HasFactory;

    protected $table = 'prod_configuravels';

    protected $fillable = [ 
        'name', 
        'id_produto',
    ];
}
