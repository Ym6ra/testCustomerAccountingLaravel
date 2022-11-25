<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'address',
        'created_at',
        'updated_at',
    ];

    public function autos(){
        return $this->hasMany(Auto::class);
    }
    public function scopeQuery($query){
        return $query->DB::table('clients');
    }
    public function scopeAutoJoin($query,$id){
        return $query->leftJoin('autos', 'clients.id','=','autos.client_id')
                    ->where('clients.id', $id)
                    ->get();
    }
    public function scopeSelectByVal($query,$val){
        return $query->select($val)->orderBy($val)->get();
    }
    public function scopeSearchByVal($query, $val)
    {
        return $query->where($val[0], $val[1])->limit(1);
    }

    public function scopeInsertDataGetId($query,$req){
        return $query->insertGetId([
            'name' => htmlspecialchars($req->input('name')),
            'gender' => htmlspecialchars($req->input('gender')),
            'phone' => htmlspecialchars($req->input('phone')),
            'address' => htmlspecialchars($req->input('address')),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
    }
    public function scopeUpdateData($query,$req){
        return $query -> update([
            'name' => htmlspecialchars($req->input('name')),
            'gender' => htmlspecialchars($req->input('gender')),
            'phone' => htmlspecialchars($req->input('phone')),
            'address' => htmlspecialchars($req->input('address')),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
    }
}
//проверено перед commit
