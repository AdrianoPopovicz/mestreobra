<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['areaprincipal'];

    public function especifica(){
        return $this->hasMany(Especifica::class, 'principal', 'id');
    }
    public function areaprincipal(){
        return $this->hasMany(Pedido::class, 'pedido', 'id');
    }
}
