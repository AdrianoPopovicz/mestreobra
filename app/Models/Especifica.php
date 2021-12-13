<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especifica extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['areaespecifica', 'principal'];

    public function Principal(){
        return $this->belongsTo(Area::class, 'principal', 'id');
    }

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'especifico', 'id');
    }
}
