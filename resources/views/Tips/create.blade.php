@extends('layout')
@section('tittle',"Crear Propina")
@section('content')
    <form action="{{ route('Tips.insertStore') }}" method="POST">
        {!! @csrf_field() !!}
        <div class="md-form">
        <input type="number" name="cash" id="cash" class="form-control" value="{{old('cash')}}">
            <label for="cash">Efectivo</label>
            @if($errors->has('cash'))
                <div class="error text-danger">{{ $errors->first('cash')}}</div>
            @endif
        </div>
        <div class="md-form">
            <input type="number" name="card" id="card" class="form-control" value="{{old('card')}}">
            <label for="card">Tarjeta</label>
            @if($errors->has('card'))
                <div class="error text-danger">{{ $errors->first('card')}}</div>
            @endif            
        </div>
        <div class="md-form">
            <input type="date" name="date" id="date" class="form-control" value="{{old('date')}}">
            <label for="date">Fecha</label>
            @if($errors->has('date'))
                <div class="error text-danger">{{ $errors->first('date')}}</div>
            @endif              
        </div>
        <div class="md-form">
            <select name="cohorte" class="browser-default custom-select">
                <option value="" disabled selected>Corte</option>
                    @foreach ($allCohorts as $item)
                        <option  {{old('cohorte')==$item->id?'selected':''}} value="{{$item->id}}">{{$item->id}}</option>               
                    @endforeach
            </select>
            @if($errors->has('cohorte'))
                <div class="error text-danger">{{ $errors->first('cohorte')}}</div>
            @endif
        </div>
        <div class="md-form">           
            <select name="status" class="browser-default custom-select">
                <option value="" disabled selected>Estatus</option>
                    @foreach ($allStatus as $item)
                        <option {{old('status')==$item->id?'selected':''}} value="{{$item->id}}">{{$item->name}}</option>               
                    @endforeach
            </select>
            @if($errors->has('status'))
                <div class="error text-danger">{{ $errors->first('status')}}</div>
            @endif  
        </div>

        @foreach ($allWaiters as $item)
            <div class="form-check ">
                <input type="checkbox" name="checkWaiters[]" class="form-check-input" id="materialInline1" value="{{$item->id}}">
                <label class="form-check-label" for="materialInline1">{{$item->name}}</label>
            </div>
        @endforeach
        @if($errors->has('checkWaiters'))
            <div class="error text-danger">{{ $errors->first('checkWaiters')}}</div>
        @endif 

        <button type="submit" class="btn btn-default btn-lg btn-block">Guardar</button>
    </form>
@endsection