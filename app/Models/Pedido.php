<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;


    protected $fillable = [
        'descricao',
        'orcamentos',
        'pedido',
        'user',
        'prestador',
        'ativo',
        'valorCliente',
        'fotosPedidos',
        'diasEmAberto',
        'encerrarCliente',
        'encerrarPrestador',
    ];

    public function pedido(){
        return $this->belongsTo(Area::class, 'pedido', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function especifico(){
        return $this->belongsTo(Especifica::class, 'especifico', 'id');
    }

    public function orcamento(){
        return $this->hasMany(Orcamento::class, 'pedido', 'id');
    }

    public function fotos()
    {
        return $this->hasMany(FotoPedido::class, 'pedido', 'id');
    }
}
