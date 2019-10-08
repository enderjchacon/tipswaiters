@extends('layout')
@section('tittle',"Listado de Estatus")
@section('content')
    <div class="d-flex justify-content-between align-items-end py-2">
        <a href="{{route('status.create')}}">
            <button type="button" class="btn btn-success btn-rounded">Agregar Estatus</button>
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
       <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    
        @foreach ($allStatus as $item)
        <tr>
            <td class="th-sm">{{ $item->id }}</td>
            <td class="th-sm">{{ $item->name }}</td>
            <td>
                <form action="{{route('status.destroy',$item)}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                    <a href="{{route('status.update',$item)}}">
                        <button type="button" class="btn btn-warning btn-sm">Editar</button>
                    </a>
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button type="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
@endsection
