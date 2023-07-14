<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MPP - Mesa de Ayuda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
</head>
<body>
<div class="container-fluid">
    <div class="row bg bg-dark text-white">
        {{-- <a class="navbar-brand m-2">Universidad Nacional del Altiplano</a> --}}
    </div>
    <div class="row text-white" style="background-color: #007cc8">
            <div class="col-md-12 pt-5">
                <center>    
                    <h1> <b>Sistema de Gestión de Incidencias</b></h1>
                </center>
            </div>
    </div>
    <div class="row" style="background-color: #f2f4fc; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
        <div class="col-md-12 m-3">
            <center>
                <h3 class=""> <i class="bi bi-pc-display"></i>Registrar Incidencia</h3>
            </center>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            {{-- <div class="card border-light mt-5">
                <div class="card text-dark"> --}}



                    {{-- <h4 id="" class="card-header">EVENTO </h4> --}}
{{--                    @foreach($oficinas as $oficina)--}}
{{--                        <p>{{$oficina->nombre_oficina}}</p>--}}
{{--                    @endforeach--}}

                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-10 mb-3 mt-4">
                                        <select type="text" id="info_oficina" name="oficinaid" class="js-select2 form-control" placeholder="Oficina" name="oficina">
                                            @foreach ($oficinas as $oficina)
                                                <option value="{{$oficina->id}}" {{($oficina->id==$of)?"selected":""}}>{{$oficina->nombre_oficina}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-2 mt-4">
                                        <a href="{{route('helpdesk')}}" class="btn btn-danger" >Cancelar</a>
                                    </div>
                                </div>


                                <div class="intro">
    {{--
                                        <p>{{ Request::route()->getName() }}</p>
    --}}
                                    {{--<p>{{ Request::path() }}
                                    </p>--}}
                                    <h1>OFICINA {{$of}}</h1>



                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Incidencia</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('ticket.store')}}" method="post" id="nuevoticket1">
                                        @csrf
                                    <div class="modal-body">


                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="text" readonly  class="form-control" name="oficina" id="oficina"  >
                                                    <label for="oficina">Oficina:</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="text" readonly class="form-control" name="pc1" id="pc1" >
                                                    <input type="text" readonly class="form-control" name="pc" id="pc" hidden>
                                                    <label for="pc">Computadora:</label>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="col-md-12 mb-3 mt-4 ">
                                                {{--                                    <input type="text" id="" class="form-control" value="" placeholder="Incidencia *" name="incidencia">--}}
                                                <select id="s_incidencia" class="form-select mb-3" aria-label="example" name="incidencia" required onchange="f_otros()">
                                                    <option id="limpi" selected value>Seleccione Incidencia</option>
                                                    @foreach ($incidencias as $incidencia)
                                                        <option value="{{$incidencia->nombre}}">{{$incidencia->nombre}}</option>
                                                    @endforeach
                                                </select>

                                                <div id="errorIncidencia" style="color: #dc3545">

                                                </div>
                                                <input type="text" id="otros" class="form-control" value="" placeholder="Decriba su problema" name="otros" hidden>
                                                {{--                                    <input type="hidden" name="oficina" value="{{$oficina}}">--}}
                                            </div>
                                           {{-- <div class="d-flex justify-content-end mt-3">
                                                <button class="btn btn-success ">Registrar Incidencia</button>
                                            </div>--}}


                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" onclick="limpiar()" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button class="btn btn-success ">Registrar Incidencia</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="row g-4" id="paginated-list" aria-live="polite">
                            @foreach ($dispositivos as $d)
                                <div class="col-lg-2 col-md-6" >
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>PC
                                                @if($d->estado=='Funcional')
                                                <span class="badge bg-success">{{$d->estado}}</span>
                                                @elseif($d->estado=='Incidencia')
                                                    <span class="badge bg-warning ">{{$d->estado}}</span>
                                                @elseif($d->estado=='Suspendido')
                                                    <span class="badge bg-danger ">{{$d->estado}}</span>
                                                @elseif($d->estado=='Inactivo')
                                                    <span class="badge bg-dark ">{{$d->estado}}</span>
                                                @endif

                                            </h5>

                                        </div>
                                        @if($d->estado=='Funcional')
                                            @php
                                                $color="198754"
                                            @endphp
                                        @elseif($d->estado=='Incidencia')
                                            @php
                                                $color="ffc107"
                                            @endphp
                                        @elseif($d->estado=='Suspendido')
                                            @php
                                            $color="dc3545"
                                            @endphp
                                        @elseif($d->estado=='Inactivo')
                                            @php
                                            $color="a7a1a1"
                                            @endphp
                                        @endif
                                        <div class="card-body">
                                            <center>
                                            <svg  style="fill:#{{$color}}; height: 50px;" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                    <g><path id="com" d="M388,101v40h124v-40H388z M0,151v228h368V151H0z M388,151v40h124v-40H388z M24,175h320v180H24V175z
                                                    M388,201v40h124v-40H388z M388,251v160h124V251H388z M435,341h30v5v25h-30v-25V341z M104,387l-16,16v8h192v-8l-16-16H104z"/>
                                                    </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                                <h5 class="card-title">{{$d->posicion}}</h5>
                                                @if($d->estado!='Funcional')
                                                    <p>{{$d->tickets->last()->incidencia}}</p>
                                                @else
                                                    <button type="button" onclick="enviar2(this,{{$d->id}},{{$d->posicion}})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Incidencia
                                                    </button>
                                                @endif

{{--                                                <a value="{{$d->id}}" onclick="enviar2(this,{{$d->posicion}})" href="#" data-bs-toggle="modal" ata-bs-target="#exampleModal" class="btn btn-primary">incidencia</a>--}}

                                            </center>

                                        </div>
                                    </div>
                                    <div class="service">

                                    </div>
                                </div>

                            @endforeach
                        </div>

                    </div>

                {{-- </div>
            </div> --}}
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
    let pc1;
    let oficina = {{$of}};
    let pc;
    document.getElementById('oficina').value = oficina;
    function limpiar(){
        console.log("limpiar");

        window.location.href ={{$of}};
    }
    let inci = document.querySelector('#inci');
    // Obtener una referencia al elemento select
    const select = document.querySelector('#info_oficina');
    select.addEventListener("change", (e) => {
        console.log("ga");
        let option = e.currentTarget.selectedOptions[0];
        console.log(option.value);
        window.location.href = "/dispositivos/"+option.value;
        console.log("xd");

    });
    // Obtener una referencia a la opción que quieres modificar


    //window.location.href = "/dispositivos/2";
    function enviar2(e,i,d){
        console.log("hola2");
        console.log(i);
        pc = i;
        pc1=d;
        document.getElementById('pc').value = pc;
        document.getElementById('pc1').value = pc1;

        console.log(inci);
        //ss$('#exampleModal').modal({ show:true });
        //
        //const myModalAlternative = new bootstrap.Modal('#myModal', options)
        //localStorage.setItem('pc', JSON.stringify(pc));
        //window.location.href = "/incidencia";

    }
    const f_otros = () => {
        if (document.getElementById('s_incidencia').value == "OTROS") {
            document.getElementById('otros').hidden = false;
            console.log('otros');
        }else{
            document.getElementById('otros').hidden = true;
            document.getElementById('otros').value = ""
        }
    }






    //


</script>
</body>
</html>
