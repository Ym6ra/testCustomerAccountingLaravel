<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class createAuto extends Model
{
    use HasFactory;

    public function client(){
        return $this->belongsTo('App/Models/createClient', 'client_id','id');
    }
}
