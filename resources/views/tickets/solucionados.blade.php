@extends('adminlte::page')

@section('title', 'Dispositivos Solucionados')

@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Dispositivos Solucionados</h1>
@stop

@section('content')

<div class="card">
  <div class="card-body">
    <table class="table table-striped text-center" id="tcategoria">
      <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>INCIDENCIA</th>
            <th>OFICINA</th>
            <th>ESTADO</th>
            <th>ACCIONES</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tickets as $ticket)
            <tr class="">
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->incidencia}}</td>
                <td>{{$ticket->oficina->nombre_oficina}}</td>
                <td><h5><span class="badge bg-success"> {{$ticket->estado}} </span></h5></td>
                <td>
                    <a href="{{route('tickets.edit', $ticket->id)}}" class="btn btn-primary">Editar</a>
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
    dom: 'Bfrtip',
                buttons: [
                    'print'
                ],
                "order": false,
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








