@extends('layout')
@section('tittle',"Viendo Propinas del Mesero: $nameWaiter")
@section('content')

    <div class="d-flex justify-content-between align-items-end py-2">
        <a href="{{route('Waiters.index')}}">
            <button type="button" class="btn btn-success btn-rounded">Volver</button>
        </a>
        </div>
    <table
    id="dtMaterialDesignExample"
    class="table table-striped pt-10"
    cellspacing="0"
    width="100%"
    >
    <thead>
    <tr>
       <th>Fecha</th>
       <th>Monto Ganado</th>
       <th>Monto Acumulado</th>
       <th>Fecha Corte</th>
    </tr>
    </thead>
    <tbody>
        @php
            $acum = 0;
        @endphp
        @foreach ($TipsWaiter as $key => $item)
        @php
           $acum += $item->amount;
        @endphp
        
        <tr>
            <td class="th-sm">{{ date('d-m-Y', strtotime($item->date)) }}</td>
            <td class="th-sm">{{ $item->amount }}</td>
            <td class="th-sm">{{ $acum }}</td>
            <td class="th-sm">{{ date('d-m-Y', strtotime($item->dateCohort)) }}</td>
        </tr>

        @endforeach

    </tbody>
    </table>
@endsection