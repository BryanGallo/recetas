<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    //relacion invertida perfil-usuario
    public function perfiluser(){
        return $this->belongsTo(User::class,'user_id');
    }
}
