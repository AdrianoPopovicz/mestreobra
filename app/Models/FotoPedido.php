<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoPedido extends Model
{
    use HasFactory;
    protected $fillable = ['fotoName', 'pedido'];

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'pedido', 'id');
    }
}
