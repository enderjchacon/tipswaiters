@extends('layout')
@section('tittle',"Listado de Propinas")
@section('content')

    <div class="d-flex justify-content-between align-items-end py-2">
        <a href="{{route('Tips.create')}}">
            <button type="button" class="btn btn-success btn-rounded">Agregar Propina</button>
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
       <th>Id</th>
       <th>Efectivo</th>
       <th>Tarjeta</th>
       <th>Fecha</th>
       <th>Corte</th>
       <th>Estatus</th>
       <th>Acciones</th>
    </tr>
    </thead>
    <tbody>

        @foreach ($allTips as $item)
        
        <tr>
            <td class="th-sm">{{ $item->id }}</td>
            <td class="th-sm">{{ $item->cash }}</td>
            <td class="th-sm">{{ $item->card }}</td>
            <td class="th-sm">{{ $item->date->format('d-m-Y') }}</td>
            <td class="th-sm">{{ $item->cohorte }}</td>
            <td class="th-sm">{{ $allStatus[$item->status]['name'] }}</td>
            <td>
                <form action="{{route('Tips.deleteStore',$item)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                    
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button type="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                </form>
            </td>
        </tr>

        @endforeach

    </tbody>
    </table>
@endsection