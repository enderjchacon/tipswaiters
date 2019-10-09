<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Cohorts;

class CohortsController extends Controller
{
    function index()
    {
        $allCohorts = Cohorts::all();
        $allStatus  = Status::all()->keyBy('id');

        return view('cohorts.index',['allStatus'=>$allStatus,'allCohorts'=>$allCohorts]);
    }

    function create()
    {
        $allStatus = Status::all();
        return view('cohorts.create',['allStatus'=>$allStatus]);
    }

    function update(Cohorts $Cohorts)
    {
        $allStatus = Status::all();
        return view('cohorts.edit',['Cohorts'=>$Cohorts,'allStatus'=>$allStatus]);
    }

    function insertStore(Cohorts $Cohorts)
    {
        $req = request()->validate([
            'date'    => ['required','date'],
            'status'  => 'required'
        ],[
            'date.required'     => 'Campo Obligatorio',
            'status.required'   => 'Campo Obligatorio',
            'date.date'         => 'Formato de Fecha Invalido',
        ]);
        
        Cohorts::create($req);

        return redirect()->route('cohorts.index');
    }

    function updateStore(Cohorts $Cohorts)
    {
        $req = request()->validate([
            'date'    => ['required','date'],
            'status'  => 'required'
        ],[
            'date.required'     => 'Campo Obligatorio',
            'status.required'   => 'Campo Obligatorio',
            'date.date'         => 'Formato de Fecha Invalido',
        ]);

        $Cohorts->update($req);

        return redirect()->route('cohorts.index');
    }

    function deleteStore(Cohorts $Cohorts)
    {
        $Cohorts->delete();
        return redirect()->route('cohorts.index');
    }
}
