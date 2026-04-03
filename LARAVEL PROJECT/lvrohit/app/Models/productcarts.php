<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class productcarts extends Model
{
    use HasFactory;
    function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
    function products(){
        return $this->hasOne('App\Models\products','id','product_id');  
    }
    
}
