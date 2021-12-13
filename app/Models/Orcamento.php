<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;
    protected $fillable = [
        'pedido',
        'valor',
        'tempo',
        'diaInicio',
        'prestador',
        'avaliado',
        'aceito'
    ];

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'pedido', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'orcamentos', 'id');
    }
}
