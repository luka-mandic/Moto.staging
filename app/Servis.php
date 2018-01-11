<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $fillable = ['motor_id', 'opis'];

    public function motori()
    {
    	return $this->belongsTo('\App\Motor');
    }
}

