<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\CreateClientRequest;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Auto;

class AutosController extends Controller
{
    public function submitAuto(CreateAutoRequest $req)
    {
        $auto = Auto::Query()->InsertData($req);
        return redirect()->route('oneClientData', $req->input('client_id'));
    }

    public function updateStatus($id, CreateAutoRequest $req)
    {
        $val = 'id';
        $auto = Auto::Query()->SearchByVal($val, $id)->Status($req);
        return redirect()->back();
    }

    public function updateAuto($id)
    {
        $val = 'id';
        $auto = Auto::Query()->SearchByVal($val,$id)->first();
        return view('updateAuto', ['data' => $auto]);
    }

    public function submitUpdateAuto($id, CreateAutoRequest $req)
    {
        $client_id = $req->input('client_id');
        $auto = Auto::Query()->SearchId($id)->UpdateData($req);
        return redirect()->route('oneClientData', $client_id);
    }
    public function statistic()
    {
        $autos = Auto::StatisticInfo();
        return view('statistic', ['data' => $autos]);
    }
    public function deleteAuto($id)
    {
        $val = 'id';
        $auto = Auto::Query()->SearchByVal($val, $id)->delete();
        return redirect()->back();
    }
}
