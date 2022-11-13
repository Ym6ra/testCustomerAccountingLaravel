<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateClientRequest;

class CreateController extends Controller
{
    public function submit(CreateClientRequest $req)
    {
        $validation = $req->validate([
            'name' => 'required|min:3',
            'gender' => 'required',
            'phone' => 'required',
            'adress' => 'required',
            'cars' => 'required',
        ]);
        dd($req->input());
    }
}
