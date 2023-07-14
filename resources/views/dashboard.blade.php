@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

<div class="row mt-4">
<div class="col-md-4">
    <x-adminlte-small-box title="40" text="Dispositivos Registrados" icon="fas fa-users text-white"
    theme="dark" url="#" url-text="Ver Detalles"/>
</div>

<div class="col-md-4">
    <x-adminlte-small-box title="12" text="Incidencias Registrados" icon="fa fa-file-pdf text-white"
    theme="info" url="#" url-text="Ver Detalles"/>
</div>

<div class="col-md-4">
    <x-adminlte-small-box title="50" text="Solucionados Registrados" icon="fa fa-users text-white"
    theme="dark" url="#" url-text="Ver Detalles" id="sbUpdatable"/>
</div>

<div class="col-md-4 offset-md-4">
    <x-adminlte-small-box title="5" text="Suspendidos Registrados" icon="fas fa-book text-white"
    theme="info" url="#" url-text="Ver Detalles" id="sbUpdatable"/>
</div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop






