<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Client extends Model
{
    use HasFactory;

    public function autos(){
        return $this->hasMany(Auto::class);
    }

    //public function GetAllData(){
    //    $AllClientsData = DB::table('clients')->get();
    //    dump($AllClientsData);
    //    return $AllClientsData;
    //}

    //public function CreateClient ($req){
    //    $client =  DB::table('clients')->insertGetId([
    //        'name' => htmlspecialchars($req->input('name')),
    //        'gender' => htmlspecialchars($req->input('gender')),
    //        'phone' => htmlspecialchars($req->input('phone')),
    //        'address' => htmlspecialchars($req->input('address')),
    //        'cars' => 1,
    //        "created_at" =>  \Carbon\Carbon::now(),
    //        "updated_at" => \Carbon\Carbon::now(),
    //    ]);
    //    dd($client);
    //    return $client; 
    //}

    protected $fillable = [
        
    ];


}
