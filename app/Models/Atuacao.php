<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atuacao extends Model
{
    use HasFactory;
    protected $fillable = ['areas', 'prestador'];

    public function prestador(){
        return $this->belongsToMany(User::class, 'prestador', 'id');
    }
}
