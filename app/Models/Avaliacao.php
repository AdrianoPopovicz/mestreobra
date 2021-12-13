<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota',
        'prestador',
        'comentario',
    ];

    public function prestador(){
        $this->belongsTo(User::class, 'prestador', 'id');
    }
}
