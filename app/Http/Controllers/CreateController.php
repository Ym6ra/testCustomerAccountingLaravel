<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\CreateClientRequest;
use App\Models\Client;
use App\Models\Auto;

class CreateController extends Controller
{





    public function submitClient(CreateClientRequest $req)
    {
        $client = new Client();
        $client->name = $req->input('name');
        $client->gender = $req->input('gender');
        $client->phone = $req->input('phone');
        $client->address = $req->input('address');
        $client->cars = 1;

        $client->save();

        return redirect()->route('createAuto');
    }
    public function submitAuto(CreateAutoRequest $req)
    {
            $auto = new Auto();
            $auto->client_id = $req->input('client_id');
            $auto->mark = $req->input('mark');
            $auto->model = $req->input('model');
            $auto->color = $req->input('color');
            $auto->number = $req->input('number');
            $auto->status = $req->input('status');
            $auto->save();
            echo $auto;
        
        return redirect()->route('createAuto');
    }

    public function ClientData()
    {
        $client = Client::latest()->first();
        return view('createAuto', ['data' => $client]);
    }
    public function ClientAllData()
    {
        return view('home', ['data' => Client::all()]);
    }
}
