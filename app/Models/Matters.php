<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matters extends Model 
{

    protected $table = 'Matter';
    public $timestamps = true;

    public function Imput()
    {
        return $this->belongsTo(Matters::class, 'matter_id');
    }

    public function Export()
    {
        return $this->belongsTo('App\Models\Exports', 'matter_id');
    }
    public function Categorys(){
        return $this->belongsTo(Categorys::class);
    }

}