<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Cohorts;
use App\Models\Tips;
use App\Models\Waiters;
use App\Models\TipsWaiters;

class TipsController extends Controller
{
    function index()
    {
        $allTips = Tips::all();
        $allStatus  = Status::all()->keyBy('id');
        
        return view('Tips.index',['allStatus'=>$allStatus,'allTips'=>$allTips]);
    }

    function create()
    {
        $allStatus  = Status::all();
        $allCohorts = Cohorts::all();
        $allWaiters = Waiters::all();

        return view('Tips.create',
        [
            'allStatus'     => $allStatus,
            'allCohorts'    => $allCohorts,
            'allWaiters'    => $allWaiters
        ]);
    }

    function update(Tips $Tips)
    {
        $allStatus = Status::all();
        return view('Tips.edit',['Tips'=>$Tips,'allStatus'=>$allStatus]);
    }

    function insertStore(Tips $Tips)
    {
        $req = request()->validate([
            'cash'      => 'required|integer',
            'card'      => 'required|integer',
            'date'      => 'required|date',
            'cohorte'   => 'required',
            'status'    => 'required',
            'checkWaiters'   => 'required'
        ],[
            'cash.required' => 'Campo Requerido',
            'cash.integer'  => 'Permitido Solo Numeros',
            'card.required' => 'Campo Requerido',
            'card.integer'  => 'Permitido Solo Numeros',
            'cash.required' => 'Campo Requerido',
            'date.required' => 'Campo Requerido',
            'date.date'     => 'Formato de Fecha Invalido',
            'cohorte.required' => 'Campo Requerido',
            'status.required'  => 'Campo Requerido',
            'checkWaiters.required'  => 'Seleccione al menos 1'
        ]);

        $idTip = Tips::create($req);

        $waitersAssit   = count($req['checkWaiters']);
        $amountTip      = $req['card']+$req['cash'];
        $amountByWaiter = $amountTip/$waitersAssit;
        $idTip          = $idTip->id;

        foreach ($req['checkWaiters'] as $idWaiter) {

            $dataWaiter = Waiters::find($idWaiter);
            $porcentaje = $dataWaiter['porcentaje']/100;
            $amountAssignedWaiter = $amountByWaiter*$porcentaje;

            TipsWaiters::create([
                'amount' => $amountAssignedWaiter,
                'tip_id' => $idTip,
                'waiter_id' => $idWaiter
            ]);

        }
        return redirect()->route('Tips.index');
    }


    function deleteStore(Tips $Tips)
    {
        
        $Tips->delete();
        TipsWaiters::where('tip_id',$Tips['id'])->delete();
        
        return redirect()->route('Tips.index');
    }
}
