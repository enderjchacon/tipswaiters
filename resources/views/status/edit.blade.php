@extends('layout')
@section('tittle',"Editar Estatus")
@section('content')
    <form action="{{ route('status.updateStore',$status) }}" method="POST">
        
        {{ method_field('PUT') }}
        {!! @csrf_field() !!}

        <div class="md-form">
            <input type="text" name="name" id="nameStatus" class="form-control" value="{{ old('name', $status->name) }}">
            <label for="nameStatus">Nombre del Estatus</label>
            @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name')}}</div>
            @endif
        </div>
        <input type="hidden" name="id" value="{{$status->id}}">
        <button type="submit" class="btn btn-default btn-lg btn-block">Guardar</button>
    
    </form>
@endsection