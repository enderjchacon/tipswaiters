<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipsWaiters;
use App\Models\Waiters;
use App\Models\Status;

class TipsWaitersController extends Controller
{
    function index(Waiters $Waiters)
    {
        $TipsWaiter = TipsWaiters::join("tips","tips_waiters.tip_id","=","tips.id")
        ->join('cohorts', 'cohorts.id', '=', 'tips.cohorte')
        ->orderBy('tips.date', 'DESC')
        ->where('waiter_id',$Waiters['id'])
        ->get([
            'tips_waiters.amount',
            'tips.date',
            'cohorts.date as dateCohort',
            'tips.status'
        ]);
        
        $allStatus  = Status::all()->keyBy('id');

        return view('Tips.detail',['allStatus'=>$allStatus,'nameWaiter'=>$Waiters['name'],'TipsWaiter'=>$TipsWaiter]);
    }
}
