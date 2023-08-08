<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Units extends Model 
{

    protected $table = 'Unit';
    public $timestamps = true;

    public function Imput()
    {
        return $this->belongsTo('App\Models\Inputs', 'Unit_id');
    }

}