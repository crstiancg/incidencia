@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<center>
    <h1>CREAR OFICINA</h1>
</center>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-4">
                <div class="card border-dark">
                    <h4 class="card-header border-dark">NUEVA OFICINA</h4>
                    <div class="card-body">
                        {{--{!! Form::open(array('route'=>'oficina.store','method'=>'POST','class'=>'mt-2')) !!}--}}
                        <form action="{{route('oficinas.store')}}" method="post">
                        {{--@method('POST')--}}
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="oficina" class="form-label">
                                    Nombre de la Oficina
                                <span style="color: red;">*</span>
                                </label>
                                {{--{!! Form::text('oficina', null,array('class'=>'form-control '.($errors->has('oficina') ? 'is-invalid':''))) !!}--}}
                                <input type="text" class="form-control" name="oficina">
                                @error('oficina')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="pass" class="form-label">
                                    Contraseña:
                                    <span style="color: red;">*</span></label>
                                {{--{!! Form::text('pass', null,array('class'=>'form-control '.($errors->has('pass') ? 'is-invalid':''))) !!}--}}
                                <input type="text" class="form-control" name="pass">
                                @error('pass')
                                <span class="invalid-feedback">
                                    <strong> {{$message}} </strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="estado" class="form-label">
                                    Estado:
                                <span style="color: red;">*</span>
                                </label>
                                <select name="estado" id="" class="form-control">
                                    <option value="0" selected>Activo</option>
                                    <option value="1" >Inactivo</option>
                                </select>
                                {{--{{Form::select('estado', ['0' => 'Activo', '1' => 'Inactivo'], null, ['class'=>'form-select']);}}--}}
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <a href="../oficinas" class="btn btn-danger">Cancelar</a>
                        </center>
                        {{--{!! Form::close() !!}--}}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


