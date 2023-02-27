<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudient extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'adresse',
        'phone',
        'date_naissance',
        'ville_id'
    ];

    public function etudientHasVille(){
        return $this->hasOne('App\Models\Ville','id','ville_id');
    }

    


}
