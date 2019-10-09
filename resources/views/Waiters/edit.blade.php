@extends('layout')
@section('tittle',"Editar Mesero")
@section('content')
    <form action="{{ route('Waiters.updateStore',$Waiters) }}" method="POST">
        {!! @csrf_field() !!}
        {{ method_field('PUT') }}
        <div class="md-form">
            <input type="text" name="name" id="name" class="form-control" value={{$Waiters->name?$Waiters->name:old('name')}}>
            <label for="name">Nombre del Mesero</label>
            @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name')}}</div>
            @endif
        </div>
        <div class="md-form">
            <input type="number" name="porcentaje" id="porcentaje" class="form-control" value={{$Waiters->porcentaje?$Waiters->porcentaje:old('porcentaje')}}>
            <label for="porcentaje">Porcentaje Asignado</label>
            @if($errors->has('porcentaje'))
                <div class="error text-danger">{{ $errors->first('porcentaje')}}</div>
            @endif
        </div>
        <div class="md-form">
            <select name="status" class="browser-default custom-select">
                <option value="" disabled selected>Estatus</option>
                    @foreach ($allStatus as $item)
                        <option {{ (old('status')==$item->id ||($Waiters->status == $item->id))?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>               
                    @endforeach
            </select>
            @if($errors->has('status'))
                <div class="error text-danger">{{ $errors->first('status')}}</div>
            @endif
        </div>
        <button type="submit" class="btn btn-default btn-lg btn-block">Guardar</button>
    </form>
@endsection