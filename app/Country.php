<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public function continent()
    {
        return $this->belongsTo('App\Continent', 'continent_code', 'code');
    }
}
