<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspeet extends Model
{
    use HasFactory;
    protected $fillable = [
        "value",
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function element(){
        return $this->hasMany(Element::class);
    }
}
