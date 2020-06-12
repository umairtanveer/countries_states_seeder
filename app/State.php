<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PragmaRX\Countries\Package\Countries;

class State extends Model
{
    public static function states($countryCode)
    {
        $countries = new Countries();
        try {
            return $countries->where('cca3', $countryCode)->first()->hydrateStates()->states->pluck('name', 'postal')->toArray();
        } catch (\Exception $ex) {
            return [];
        }
    }
}
