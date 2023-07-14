@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Gestión de Usuarios</h1>
@stop

@section('content')
{{-- <a class="btn btn-info mb-3" href="{{route('usuarios.create')}}">Registrar Usuario</a> --}}
<div class="card">
  <div class="card-body">
    <table class="table table-striped text-center" id="usuario">
        <thead class="thead-dark">
            <tr>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Rol</th>
              <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $usuario)
        <tr>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>
                @if(!empty($usuario->getRoleNames()))
                    @foreach($usuario->getRoleNames() as $rolName)
                        <h5><span class="badge bg-warning"> {{$rolName}} </span></h5></td>
                    @endforeach
                @endif
            </td>
            <td>
                <a href="{{route('usuarios.edit', $usuario->id)}}" class="btn btn-primary">Editar</a>
                <form action="{{route('usuarios.destroy', $usuario)}}" method="post" style="display: inline" class="eliminar">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Borrar</button>
                </form>
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

  $('#usuario').DataTable({
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