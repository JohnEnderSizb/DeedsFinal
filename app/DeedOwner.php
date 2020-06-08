<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeedOwner extends Model
{
    protected $guarded = [];


    public function deeds(){
        return $this->hasMany(Deed::class);
    }
}
