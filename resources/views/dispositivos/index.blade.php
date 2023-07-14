@extends('adminlte::page')

@section('title', 'Practicas')

@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Gestión de Dispositivos</h1>
@stop

@section('content')
<a class="btn btn-info mb-3" href="{{ route('dispositivos.create') }} ">Registrar Dispositivo</a>
<div class="card">
  <div class="card-body">
    <table class="table table-striped text-center" id="tcategoria">
      <thead class="thead-dark">
            <th>DESCRIPCIÓN</th>
            <th>MODELO</th>
            <th>MARCA</th>
            <th>SERIE</th>
            <th>COLOR</th>
            <th>ESTADO</th>
            <th>CONDICIÓN</th>
            <th>POSICIÓN</th>
            <th>OBSERVACIÓN</th>
            <th>AMBIENTE</th>
            <th>ACCIONES</th>
        </thead>
        <tbody>
            @foreach ($dispositivos as $dispositivo)
                <tr class="">
                    <td> {{$dispositivo->descripcion}} </td>
                    <td> {{$dispositivo->modelo}} </td>
                    <td> {{$dispositivo->marca}} </td>
                    <td> {{$dispositivo->serie}} </td>
                    <td> {{$dispositivo->color}} </td>
                    @if ($dispositivo->estado==="Incidencia")
                        <td><span class="badge bg-warning" > Incidencia </span></td>
                    @elseif ($dispositivo->estado==="Funcional")
                        <td><span class="badge bg-success" > Funcional</span></td>
                    @elseif ($dispositivo->estado==="Suspendido")
                        <td><span class="badge bg-danger" > Suspendido </span></td>
                    @else 
                        <td><span class="badge bg-dark" > Inactivo </span></td>
                    @endif
                    @if ($dispositivo->condicion==="Nuevo")
                        <td><span class="badge bg-success" > Nuevo </span></td>
                    @elseif ($dispositivo->condicion==="Regular")
                        <td><span class="badge bg-warning" > Regular </span></td>
                    @elseif ($dispositivo->condicion==="Malo")
                        <td><span class="badge bg-danger" > Malo </span></td>
                    @else
                        <td><span class="badge bg-danger" > Chatarra</span></td>
                    @endif
                    <td> {{$dispositivo->posicion}} </td>
                    <td> {{$dispositivo->observacion}} </td>

                        <td><span class="badge bg-success" >{{$dispositivo->oficina->nombre_oficina}} </span></td>

                    <td>
                        <a href=" {{ route('dispositivos.edit', $dispositivo) }} " class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
    </table>
  </div>
</div>
@stop

@section('js')

@if(session('eliminar') == 'delete')
<script>
 Swal.fire(
          '¡Eliminado!',
          'El registro ha sido eliminado.',
          'success'
        )
</script>
@endif
<script>
  $('.eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
      title: '¿Estas seguro?',
      text: "No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, eliminarlo!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {

        this.submit();
      }
    })

  });

  $('#tcategoria').DataTable({
    responsive: true,
    autoWidth: false,
    "language": {
          "lengthMenu": "Mostrar "+`
          <select class="custom-select custom-select-sm form-control form-control-sm">
            <option value="10">10</option> 
            <option value="25">25</option> 
            <option value="50">50</option> 
            <option value="100">100</option> 
            <option value="-1">All</option> 
          </select>
          `+" registros por paginas",
          "zeroRecords": "Nada encontrado - lo siento",
          "info": "Mostrando la pagina _PAGE_ de _PAGES_",
          "infoEmpty": "No records available",
          "infoFiltered": "(filtrado de _MAX_ registro total)",
          "search":"Buscar: ",
          "paginate":{
            "next": "Siguiente",
            "previous": "Anterior"
          }
      }
  });
</script>
@stop
