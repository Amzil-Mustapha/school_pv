<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donnee extends Model
{
    use HasFactory;
    protected $fillable = [
        "value",
        "filiere_id",
        "element_id",
        
    ];

    public function element(){
        return $this->belongsTo(Element::class);
    }


    public function filiere(){
        return $this->belongsTo(Filiere::class);
    }


    
}
