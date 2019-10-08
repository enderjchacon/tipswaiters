@extends('layout')
@section('tittle',"Crear Corte")
@section('content')
    <form action="{{ route('cohorts.updateStore',$Cohorts) }}" method="POST">
        {!! @csrf_field() !!}
        {{ method_field('PUT') }}
        <div class="md-form">
            <input type="date" name="date" id="date" class="form-control" value={{$Cohorts->date}}>
            <label for="date">Fecha de Corte</label>
            @if($errors->has('date'))
                <div class="error text-danger">{{ $errors->first('date')}}</div>
            @endif           
        </div>
        <div class="md-form">
            <select name="status" class="browser-default custom-select">
                <option value="" disabled selected>Estatus</option>
                    @foreach ($allStatus as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>               
                    @endforeach
            </select>
            @if($errors->has('status'))
                <div class="error text-danger">{{ $errors->first('status')}}</div>
            @endif
        </div>
        <input type="hidden" name="id" value="{{$Cohorts->id}}">
        <button type="submit" class="btn btn-default btn-lg btn-block">Guardar</button>
    </form>
@endsection