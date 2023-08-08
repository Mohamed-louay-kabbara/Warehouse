<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorys extends Model 
{

    protected $table = 'Category';
    public $timestamps = true;

    // public function Matter()
    // {
    //     return $this->belongsTo('Matters', 'Categoryid');
    // }
    public function matter(){
        return $this->hasMany(medication::class);
    }

}