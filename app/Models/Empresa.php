<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'nomeempresa',
        'nomefantasia',
        'rua',
        'numero',
        'complemento',
        'cep',
        'bairro',
        'cidade',
        'cnpj',
        'logoEmpresa',
    ];

    public function prestadores(){
        return $this->hasMany(User::class, 'empresa', 'id');
    }
}
