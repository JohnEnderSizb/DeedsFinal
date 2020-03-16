<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    protected $guarded = [];

    public function scanActivities() {
        return $this->hasMany(ScanActivity::class)->orderBy('created_at', 'DESC');
    }
}
