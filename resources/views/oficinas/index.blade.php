@extends('adminlte::page')

@section('title', 'Practicas')

@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Gestión de Oficinas</h1>
@stop

@section('content')
<a class="btn btn-info mb-3" href="{{ route('oficinas.create') }} ">Registrar Oficina</a>
<div class="card">
  <div class="card-body">
    <table class="table table-striped text-center" id="tcategoria">
      <thead class="thead-dark">
        <tr>
          <th>Nombre</th>
          <th>Contraseña</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($oficinas as $oficina)
        <tr class="">
            <td> {{$oficina->nombre_oficina}} </td>
            <td> {{$oficina->password}} </td>
            @if ($oficina->estado==="0")
                <td><span class="badge bg-success" > Activo </span></td>
            @else
                <td><span class="badge bg-warning" > Inactivo</span></td>
            @endif
            <td>
                <a href=" {{ route('oficinas.edit', $oficina) }} " class="btn btn-primary">Editar</a>
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






