<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PragmaRX\Countries\Package\Countries;

class Country extends Model
{
    protected $table = 'countries';

    public function states()
    {
        $states = new Countries();
        try {
            return $states->where('cca3', $this->iso3)->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        } catch (\Exception $ex) {
            return [];
        }
    }

    public function continent()
    {
        return $this->belongsTo('App\Continent', 'continent_code', 'code');
    }
}
