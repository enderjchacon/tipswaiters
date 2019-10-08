@extends('layout')
@section('tittle',"Crear Estatus")
@section('content')
    <form action="{{ route('status.insertStore') }}" method="POST">
        {!! @csrf_field() !!}
        <div class="md-form">
            <input type="text" name="name" id="nameStatus" class="form-control" value="{{old('name')}}">
            <label for="nameStatus">Nombre del Estatus</label>
            @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name')}}</div>
            @endif            
        </div>
        <button type="submit" class="btn btn-default btn-lg btn-block">Guardar</button>
    </form>
@endsection