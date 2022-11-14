<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\updateStatusRequest;

use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Auto;

class CreateController extends Controller
{
    //public function index(){
    //    $clients = DB::table('clients')->paginate(3);
    //    return view('home', ['data' => $clients]);
    //}




    public function submitClient(CreateClientRequest $req)
    {
        $client = new Client();
        $client->name = $req->input('name');
        $client->gender = $req->input('gender');
        $client->phone = $req->input('phone');
        $client->address = $req->input('address');
        $client->cars = 1;

        $client->save();

        return redirect()->route('createAuto',$client->id);
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
        
        return redirect()->route('oneClientData', $auto->client_id);
    }

    //public function ClientData()
    //{
    //    $client = Client::latest()->first();
    //    return view('createAuto', ['data' => $client]);
    //}
    public function ClientData($id)
    {
        $client = Client::find($id);
        return view('createAuto',['data' => $client]);
    }
    public function ClientAllData($currentPage)
    {   
        if($currentPage){
            $page= $currentPage;
        }else{
            $page = 1;
        }
        $take = 3;
        $skip = ($page - 1) * $take;
        $clients = Client::skip($skip)->take($take)->get();
        //$clients = DB::table('clients')
        //                ->Join('autos', 'clients.id', '=', 'autos.client_id')
        //                //->skip($skip)   
        //                //->take($take)
        //                ->get(); //не могу сделать это запрос форматом DB::table, теряется зависимость с автомобилями
        $pages = ceil(DB::table('clients')->count()/ $take);
        $val =[
            'pages'=> $pages,
            'page'=>$page,
        ];

        return view('home', ['data' => $clients],['pages'=>$val]);
    }
    public function oneClient($id){
        $val=['id'=>$id];
        $client = Client::find($id);
        $curentId=(int)$id;
        //$client = DB::table('clients')
        //                ->leftJoin('autos','clients.id','=','autos.client_id')
        //                //->where('id', $id)->first(); //не может понять что за id
        //                ->where('clients.id', $id)->first(); //не может понять что за $autos далее в коде
        //dd($client);
        return view('detals', ['data' => $client],['id'=>$val]);

    }
}
