<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model 
{
    protected $table = 'Bill';
    public $timestamps = true;

    public function Imput()
    {
        return $this->belongsTo(Inputs::class, 'Bill_id');
    }
}