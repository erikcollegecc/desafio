<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PordSimples extends Model
{
    use HasFactory;

    protected $table = 'pord_simples';

    protected $fillable = ['nome', 'id_prod', 'max_price', 'min_price'];
}
