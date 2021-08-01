<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * O Laravel tem por padrão usar tabelas pivo no caso 
     * de cidades e emprasas/companias e sempre bom criar 
     * seguindo os seus padrões para econimiazar codido
     * nesta caso a tabela pivo deveria se chamar "city_company"
     * então usariamos somente este comando "return $this->belongsToMany(Company::class);"
     * como não usamaos o padrão devemos fazer desta forma
     * "return $this->belongsToMany(Company::class, 'company_city');"
     */
    public function cities(){
        return $this->belongsToMany(City::class, 'company_city');
    }
}
