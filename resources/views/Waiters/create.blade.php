@extends('layout')
@section('tittle',"Crear Mesero")
@section('content')
    <form action="{{ route('Waiters.insertStore') }}" method="POST">
        {!! @csrf_field() !!}
        <div class="md-form">
            <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
            <label for="name">Nombre del Mesero</label>
            @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name')}}</div>
            @endif
        </div>
        
        <div class="md-form">
            <input type="number" name="porcentaje" id="porcentaje" class="form-control" value="{{old('porcentaje')}}">
            <label for="porcentaje">Porcentaje Asignado</label>
            @if($errors->has('porcentaje'))
                <div class="error text-danger">{{ $errors->first('porcentaje')}}</div>
            @endif
        </div>
        <div class="md-form">
        <select name="status" class="browser-default custom-select">
            <option value="" disabled selected>Estatus</option>
                @foreach ($allStatus as $item)
                <option {{old('status')==$item->id?'selected':''}}  value="{{$item->id}}">{{$item->name}}</option>               
                @endforeach
        </select>
        @if($errors->has('status'))
            <div class="error text-danger">{{ $errors->first('status')}}</div>
        @endif
        </div>
        <button type="submit" class="btn btn-default btn-lg btn-block">Guardar</button>
    </form>
@endsection