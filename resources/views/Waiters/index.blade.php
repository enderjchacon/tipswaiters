@extends('layout')
@section('tittle',"Listado de Meseros")
@section('content')

    <div class="d-flex justify-content-between align-items-end py-2">
        <a href="{{route('Waiters.create')}}">
            <button type="button" class="btn btn-success btn-rounded">Agregar Meseros</button>
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
       <th>Nombre</th>
       <th>Porcentaje</th>
       <th>Estatus</th>
       <th>Acciones</th>
    </tr>
    </thead>
    <tbody>

        @foreach ($allWaiters as $item)
        
        <tr>
            <td class="th-sm">{{ $item->id }}</td>
            <td class="th-sm">{{ $item->name }}</td>
            <td class="th-sm">{{ $item->porcentaje }}</td>
            <td class="th-sm">{{ $allStatus[$item->status]['name'] }}</td>
            <td>
                <form action="{{route('Waiters.deleteStore',$item)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                    <a href="{{route('Waiters.updateStore',$item)}}">
                        <button type="button" class="btn btn-warning btn-sm">Editar</button>
                    </a>
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button type="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                    <a href="{{route('tips.show',$item)}}">
                        <button type="button" class="btn btn-secondary btn-sm">Ver Propinas</button>
                    </a>
                </form>
            </td>
        </tr>

        @endforeach

    </tbody>
    </table>
@endsection