<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\updateStatusRequest;
use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\CreateClientRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Auto;

class UpdateController extends Controller
{
    public function updateStatus($id, updateStatusRequest $req)
    {
        //dd($id);
        $curentId=$id;
        //$auto =  Auto::find($id);
        $auto = DB::table('autos')->where('id', $curentId)->first();
        //dd($auto);
        $auto->status = $req->input('status');
        $auto->update();
        //echo $auto;

        return redirect()->back();
    }
    public function updateClient($id)
    {
        $curentId = $id;
        //$client = Client::find($id);
        $client = DB::table('clients')->where('id', $curentId)->first();
        $val = [
            'title' => 'Редактировать клиента №',
            'form' => 'successUpdateClient',

        ];
        return view('updateClient', ['data' => $client], ['val' => $val]);
    }

    public function submitUpdateClient($id, CreateClientRequest $req)
    {
        $page = 1;
        $curentId = $id;
        //$client = Client::find($id);
        //$client->name = $req->input('name');
        //$client->gender = $req->input('gender');
        //$client->phone = $req->input('phone');
        //$client->address = $req->input('address');
        //$client->cars = 1;

        //$client->save();
        
        $client = DB::table('clients')->where('id', $curentId)->limit(1)->update([
        'name' => $req->input('name'),
        'gender' => $req->input('gender'),
        'phone' => $req->input('phone'),
        'address' => $req->input('address'),
        'cars' => 1,
        ]);

        return redirect()->route('AllData', $page);
    }
}
