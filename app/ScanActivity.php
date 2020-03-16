<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScanActivity extends Model
{
    protected $guarded = [];

    public function appUser(){
        return $this->belongsTo(AppUser::class);
    }
}
