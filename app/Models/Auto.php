<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Auto extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'mark',
        'model',
        'color',
        'number',
        'status',
        'created_at',
        'updated_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function scopeQuery($query)
    {
        return $query->DB::table('autos');
    }

    public function scopeSelectByVal($query, $val)
    {
        return $query->select($val)->groupBy($val)->orderBy($val)->get();
    }

    public function scopeSearchByVal($query, $val, $id)
    {
        return $query->where($val, $id);
    }

    public function scopeStatus($query, $req)
    {
        return $query->update(['status' => htmlspecialchars($req->input('status'))]);
    }
    public function scopeInsertData($query, $req)
    {
        return $query->insert([
            'client_id' => $req->input('client_id'),
            'mark' => htmlspecialchars($req->input('mark')),
            'model' => htmlspecialchars($req->input('model')),
            'color' => htmlspecialchars($req->input('color')),
            'number' => htmlspecialchars($req->input('number')),
            'status' => htmlspecialchars($req->input('status')),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
    }
    public function scopeUpdateData($query, $req)
    {
        return $query->update([
            'mark' => htmlspecialchars($req->input('mark')),
            'model' => htmlspecialchars($req->input('model')),
            'color' => htmlspecialchars($req->input('color')),
            'number' => htmlspecialchars($req->input('number')),
            'status' => htmlspecialchars($req->input('status')),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
    }
    public function scopeStatisticInfo($query)
    {
        $autos = Auto::query();
        $AutosCount = $autos->count();
        $AutosMark = $autos->select('mark')
            ->groupBy('mark')
            ->orderBy('mark')
            ->get();
        $AutosMarkCount = $AutosMark->count();
        for ($i = 0; $i < $AutosMarkCount; $i++) {
            $val = Auto::query()->where('mark', $AutosMark[$i]->mark)->count();
            $AutosMarkVal[$i] = $val;
        };
        $status = 'Присутствует';
        $AutosStatus = Auto::query()->where('status', $status)->get();
        $AutosStatusCount = $AutosStatus->count();
        for ($i = 0; $i < $AutosMarkCount; $i++) {
            $val = $AutosStatus->where('mark', $AutosMark[$i]->mark)->count();
            $AutosMarkStatusVal[$i] = $val;
        };
        return $query = [
            'AutosCount' => $AutosCount,
            'AutosStatus' => $AutosStatus,
            'AutosStatusCount' => $AutosStatusCount,
            'AutosMark' => $AutosMark,
            'AutosMarkCount' => $AutosMarkCount,
            'AutosMarkVal' => $AutosMarkVal,
            'AutosMarkStatusVal' => $AutosMarkStatusVal,
        ];
    }
    public function scopeAutoForPaginate($query, $val, $id)
    {
        return $query->orderBy($val)->where($val, $id)->get();
    }
}
