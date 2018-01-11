<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Motor extends Model
{
    protected $fillable = ['broj_sasije', 'naziv'];

    use Searchable;

    public $asYouType = true;

    public function servis()
    {
    	return $this->hasMany('\App\Servis');
    }
}
