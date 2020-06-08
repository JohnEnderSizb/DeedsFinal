<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deed extends Model
{
    protected $guarded = [];


    public function deedOwner(){
        return $this->belongsTo(DeedOwner::class);
    }

    public function conveyancer(){
        return $this->belongsTo(Conveyancer::class);
    }
}
