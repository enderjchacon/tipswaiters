<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
    function index()
    {
        $allStatus = Status::all();

        return view('status.index',['allStatus'=>$allStatus]);
    }

    function create()
    {
        return view('status.create');
    }

    function update(Status $Status)
    {

        return view('status.edit',['status'=>$Status]);
    }

    function insertStore()
    {
        $req = request()->validate([
            'name'    => ['required','max:50']
        ],[
            'name.required' => 'Campo Obligatorio',
            'name.max'      => 'Campo Muy Largo',
        ]);

        Status::create($req);

        return redirect()->route('status.index');
    }

    function updateStore(Status $status)
    {
        $req = request()->validate([
            'name'    => ['required','max:50'],
            'id'    => 'required'
        ],[
            'name.required' => 'Campo Obligatorio',
            'name.max'      => 'Campo Muy Largo',
        ]);

        $statusData = Status::find($req['id']);
        $updated = $statusData->update($req);

        return redirect()->route('status.index');
    }

    function deleteStore(Status $status)
    {
        $data = request()->all();
        $statusData = Status::find( $data['id'] );
        $statusData->delete();
        return redirect()->route('status.index');
    }
}
