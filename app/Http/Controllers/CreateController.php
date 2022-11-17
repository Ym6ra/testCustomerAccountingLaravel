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

class CreateController extends Controller
{
    //public function index(){
    //    $clients = DB::table('clients')->paginate(3);
    //    return view('home', ['data' => $clients]);
    //}




    public function submitClient(CreateClientRequest $req)
    {
        //$client = new Client();
        //$client->name = $req->input('name');
        //$client->gender = $req->input('gender');
        //$client->phone = $req->input('phone');
        //$client->address = $req->input('address');
        //$client->cars = 1;
        //$client->save();
        $client =  DB::table('clients')->insertGetId([
            'name' => $req->input('name'),
            'gender' => $req->input('gender'),
            'phone' => $req->input('phone'),
            'address' => $req->input('address'),
            'cars' => 1,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
        return redirect()->route('oneClientData', $client);
    }

    public function submitAuto(CreateAutoRequest $req)
    {
            //$auto = new Auto();
            //$auto->client_id = $req->input('client_id');
            //$auto->mark = $req->input('mark');
            //$auto->model = $req->input('model');
            //$auto->color = $req->input('color');
            //$auto->number = $req->input('number');
            //$auto->status = $req->input('status');
            //$auto->save();
        $auto = DB::table('autos')->insert([
            'client_id' => $req->input('client_id'),
            'mark' => $req->input('mark'),
            'model' => $req->input('model'),
            'color' => $req->input('color'),
            'number'=> $req->input('number'),
            'status' => $req->input('status'),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
        
        return redirect()->route('oneClientData', $req->input('client_id'));
    }

    //public function ClientData()
    //{
    //    $client = Client::latest()->first();
    //    return view('createAuto', ['data' => $client]);
    //}
    public function ClientData($id)
    {
        //$client = Client::find($id);
        $client = DB::table('clients')->where('id', $id)->get();
        $autos = DB::table('autos')->where('client_id', $id)->get();
        //dd($client);
        dd($autos);
        return view('createAuto',['client' => $client]);
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

        $clients = DB::table('clients')
                        ->skip($skip)   
                        ->take($take)
                        ->get();

        $clientsId = DB::table('clients')
                        ->skip($skip)   
                        ->take($take)
                        ->select('id')
                        ->orderBy('id')
                        ->get();

        $clientsPerPage = $clients->count();
        //dd($clientsPerPage);

        for ($i = 0; $i < $clientsPerPage; $i++) {
            $auto = DB::table('autos')
                ->orderBy('client_id')
                ->where('client_id', $clientsId[$i]->id)
                ->get();
            $autos[$i] = $auto;
        }
        //dump($autos);
        //dump($clients);
        //dump($clientsId);
        //dump($clientsPerPage);
        $pages = ceil(DB::table('clients')->count()/ $take);
        $val =[
            'pages'=> $pages,
            'page'=>$page,
            'clientsPerPage'=> $clientsPerPage,
            'autos'=>$autos
        ];
        //dump($val);
        return view('home', ['data' => $clients], ['val'=>$val]);
    }
    public function oneClient($id){
        //$client = Client::find($id);
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
}
