<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "type_comment",
        "aspeet_id",
    ];


    public function aspeet(){
        return $this->belongsTo(Aspeet::class);
    }

    public function donne(){
        return $this->hasOne(Donnee::class);
    }

    public function comment(){
        return $this->hasOne(Comments::class);
    }
}
