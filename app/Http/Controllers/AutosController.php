<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\updateStatusRequest;
use App\Http\Requests\updateAutoRequest;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Auto;

class AutosController extends Controller
{
    public function submitAuto(CreateAutoRequest $req)
    {
        $auto = DB::table('autos')->insert([
            'client_id' => $req->input('client_id'),
            'mark' => htmlspecialchars($req->input('mark')),
            'model' => htmlspecialchars($req->input('model')),
            'color' => htmlspecialchars($req->input('color')),
            'number'=> htmlspecialchars($req->input('number')),
            'status' => htmlspecialchars($req->input('status')),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
        
        return redirect()->route('oneClientData', $req->input('client_id'));
    }

    public function updateStatus($id, updateStatusRequest $req)
    {
        $curentId = $id;
        $auto = DB::table('autos')
        ->where('id', $curentId)
            ->limit(1)
            ->update(['status' => htmlspecialchars($req->input('status'))]);

        return redirect()->back();
    }

    public function updateAuto($id)
    {
        //dd($id);
        $currentId = $id;
        $auto = DB::table('autos')
        ->where('id', $currentId)
            ->first();

        return view('updateAuto', ['data' => $auto]);
    }

    public function submitUpdateAuto($id, updateAutoRequest $req)
    {
        $currentId = $id;
        $client_id = $req->input('client_id');

        $auto = DB::table('autos')->where('id', $currentId)->limit(1)->update([
            'mark' => htmlspecialchars($req->input('mark')),
            'model' => htmlspecialchars($req->input('model')),
            'color' => htmlspecialchars($req->input('color')),
            'number' => htmlspecialchars($req->input('number')),
            'status' => $req->input('status'),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
        return redirect()->route('oneClientData', $client_id);
    }
    public function statistic()
    {
        $autos = DB::table('autos')
        ->get();

        $AutosCount = $autos->count();

        $AutosMark = DB::table('autos')
        ->select('mark')
        ->groupBy('mark')
        ->orderBy('mark')
        ->get();
        $AutosMarkCount = $AutosMark->count();

        for ($i = 0; $i < $AutosMarkCount; $i++) {
            $val = $autos->where('mark', $AutosMark[$i]->mark)->count();
            $AutosMarkVal[$i] = $val;
        };

        $status = 'Присутствует';

        $AutosStatus = DB::table('autos')->where('status', $status)->get();

        $AutosStatusCount = $AutosStatus->count();

        for ($i = 0; $i < $AutosMarkCount; $i++) {
            $val = $AutosStatus->where('mark', $AutosMark[$i]->mark)->count();
            $AutosMarkStatusVal[$i] = $val;
        };

        $data = [
            'AutosCount' => $AutosCount, 
            'AutosStatusCount' => $AutosStatusCount, 
            'AutosMark' => $AutosMark, 
            'AutosMarkCount' => $AutosMarkCount, 
            'AutosMarkVal' => $AutosMarkVal, 
            'AutosMarkStatusVal' => $AutosMarkStatusVal,
        ];

        return view('statistic', ['data' => $data]);
    }
    public function deleteAuto($id)
    {
        $curentId = $id;
        DB::table('autos')->where('id', $curentId)->delete();

        return redirect()->back();
    }
}
