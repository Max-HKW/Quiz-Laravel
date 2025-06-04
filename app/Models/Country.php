<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
public function getFlagFileAttribute()
{
    return strtolower($this->alpha2Code) . '.png';
}

}
