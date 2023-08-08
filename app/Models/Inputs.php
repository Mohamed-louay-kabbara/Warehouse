<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inputs extends Model 
{

    protected $table = 'input';
    public $timestamps = true;

    public function entry_date()
    {
        return $this->belongsTo('App\Models\Entry_dates', 'Input_Date');
    }

}