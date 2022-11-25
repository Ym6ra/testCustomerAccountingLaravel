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
        $client =  Client::Query()->InsertDataGetId($req);
        return redirect()->route('oneClientData', $client);
    }

    public function ClientAllData()
    {
        $take = 3;
        $clients = Client::Query()->paginate($take);
        if($clients->lastPage() < $clients->currentPage()){
            return redirect()->route('AllData');
        }
        for ($i = 0; $i < $take; $i++) {
            if($clients[$i] != null){
            $val = 'client_id';
            $id = $clients[$i]->id;
            $auto = Auto::Query()->AutoForPaginate($val, $id);
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
        $client = Client::query()->AutoJoin($id);
        $val = 'id';
        $paginateId = Client::query()->SelectByVal($val);
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
        $val = ['id', $id];
        $client = Client::query()->SearchByVal($val)->first();
        return view('updateClient', ['data' => $client]);
    }
    public function submitUpdateClient($id, CreateClientRequest $req)
    {
        $val = ['id', $id];
        $client = Client::query()->SearchByVal($val)->UpdateData($req);
        return redirect()->route('AllData');
    }
    public function deleteClient($id)
    {
        $val = ['id', $id];
        $client = Client::query()->SearchByVal($val)->delete();
        return redirect()->back();
    }
}
