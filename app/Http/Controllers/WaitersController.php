<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Waiters;

class WaitersController extends Controller
{
    function index()
    {
        $allWaiters = Waiters::all();
        $allStatus  = Status::all();
        
        return view('Waiters.index',['allStatus'=>$allStatus,'allWaiters'=>$allWaiters]);
    }

    function create()
    {
        $allStatus = Status::all();
        return view('Waiters.create',['allStatus'=>$allStatus]);
    }

    function update(Waiters $Waiters)
    {
        $allStatus = Status::all();
        return view('Waiters.edit',['Waiters'=>$Waiters,'allStatus'=>$allStatus]);
    }

    function insertStore(Waiters $Waiters)
    {
        $req = request()->validate([
            'name'      => 'required|min:3|max:100',
            'porcentaje'=> 'required|integer',
            'status'    => 'required'
        ],[
            'name.required' => 'Nombre Obligatorio',
            'name.min'      => 'Nombre Muy Corto',
            'name.max'      => 'Nombre Muy Largo',
            'porcentaje.required'  => 'Porcentaje Obligatorio',
            'porcentaje.integer'   => 'Porcentaje de Solo Numeros',
            'porcentaje.max'  => 'Numero Muy largo',
            'status.required' => 'Estatus Requerido'
        ]);
        
        Waiters::create($req);

        return redirect()->route('Waiters.index');
    }

    function updateStore(Waiters $Waiters)
    {
        $req = request()->validate([
            'name'      => 'required|min:3|max:100',
            'porcentaje'=> 'required|integer',
            'status'    => 'required'
        ],[
            'name.required' => 'Nombre Obligatorio',
            'name.min'      => 'Nombre Muy Corto',
            'name.max'      => 'Nombre Muy Largo',
            'porcentaje.required'  => 'Porcentaje Obligatorio',
            'porcentaje.integer'   => 'Porcentaje de Solo Numeros',
            'porcentaje.max'  => 'Numero Muy largo',
            'status.required' => 'Estatus Requerido'
        ]);
        
        $Waiters->update($req);

        return redirect()->route('Waiters.index');
    }

    function deleteStore(Waiters $Waiters)
    {
        $Waiters->delete();
        return redirect()->route('Waiters.index');
    }
}
