<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\updateStatusRequest;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Auto;

class ClientsController extends Controller
{

    public function submitClient(CreateClientRequest $req)
    {
        $client =  DB::table('clients')->insertGetId([
            'name' => htmlspecialchars($req->input('name')),
            'gender' => htmlspecialchars($req->input('gender')),
            'phone' => htmlspecialchars($req->input('phone')),
            'address' => htmlspecialchars($req->input('address')),
            'cars' => 1,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
        return redirect()->route('oneClientData', $client);
    }

    public function ClientData($id)
    {
        $client = DB::table('clients')->where('id', $id)->get();
        $autos = DB::table('autos')->where('client_id', $id)->get();
        dd($autos);
        return view('createAuto',['client' => $client]);
    }
    public function ClientAllData()
    {
        $take = 3;
        $clients = DB::table('clients')->paginate($take);

        for ($i = 0; $i < $take; $i++) {
            if($clients[$i] != null){
            $auto = DB::table('autos')
                ->orderBy('client_id')
                ->where('client_id', $clients[$i]->id)
                ->get();
            }
            $autos[$i] = $auto;
            $autosPerClient[$i] = $auto->count();
        }

        $val =[
            'clientsPerPage'=> $take,
            'autosPerClient'=> $autosPerClient,
            'autos'=>$autos
        ];

        return view('home', ['data' => $clients], ['val'=>$val]);
    }
    public function oneClient($id){

        $client = DB::table('clients')
                        ->leftJoin('autos', 'clients.id','=','autos.client_id')
                        ->where('clients.id', $id)
                        ->get();
        
        $paginateId = DB::table('clients')
                        ->select('id')
                        ->orderBy('id')
                        ->get();
        $val = [
            'val' => ($client)->count(),
            'last' => ($paginateId)->count(),
            'clientId' => $id,
            'pid' => $paginateId,
        ];
        return view('createAuto', ['client' => $client],['data'=> $val],['pid'=>$paginateId]);

    }

    public function updateClient($id)
    {
        $curentId = $id;
        $client = DB::table('clients')->where('id', $curentId)->first();
        $val = [
            'title' => 'Редактировать клиента №',
            'form' => 'successUpdateClient',

        ];
        return view('updateClient', ['data' => $client], ['val' => $val]);
    }

    public function submitUpdateClient($id, CreateClientRequest $req)
    {
        $curentId = $id;

        $client = DB::table('clients')->where('id', $curentId)->limit(1)->update([
            'name' => htmlspecialchars($req->input('name')),
            'gender' => htmlspecialchars($req->input('gender')),
            'phone' => htmlspecialchars($req->input('phone')),
            'address' => htmlspecialchars($req->input('address')),
            'cars' => 1,
            "updated_at" => \Carbon\Carbon::now(),
        ]);

        return redirect()->route('AllData');
    }

    public function deleteClient($id)
    {
        $curentId = $id;
        DB::table('clients')->where('id', $curentId)->delete();

        return redirect()->back();
    }
}
