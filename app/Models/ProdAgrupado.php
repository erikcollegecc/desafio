<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdAgrupado extends Model
{
    use HasFactory;

    protected $table = 'prod_agrupados';

    protected $fillable = [ 
        'name_agru', 
        'id_produto',
    ];
}
