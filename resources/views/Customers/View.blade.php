<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ver Clientes</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="">
            <a href="{{route('customer.create')}}"><button class="btn btn-primary m-4">Crear Cliente</button></a>
            <a href="{{route('index')}}"><button class="btn btn-primary m-4">Inicio</button></a>
                <table class="table table-bordered m-2">
                    <thead>
                        <tr>
                            <th class="col-md-1">Identificacion</th>
                            <th class="col-md-2">Nombres</th>
                            <th class="col-md-2">Apellidos</th>
                            <th class="col-md-1">Tipo Identificacion</th>
                            <th class="col-md-1">Fecha de Nacimiento</th>
                            <th class="col-md-1">Numero Celular</th>
                            <th class="col-md-2">Correo Electronico</th>
                            <th class="col-md-2" colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($customers as $customer) 
                        <tr>
                            <td class="col-md-1">{{$customer->identificacion}}</td>
                            <td class="col-md-2">{{$customer->nombres}}</td>
                            <td class="col-md-2">{{$customer->apellidos}}</td>
                            <td class="col-md-1">{{$customer->tipoIdentificacion}}</td>
                            <td class="col-md-1">{{$customer->formatted_fecha_nacimiento }}</td>
                            <td class="col-md-1">{{$customer->numeroCelular}}</td>
                            <td class="col-md-2">{{$customer->correoElectronico}}</td>
                            <td class="col-md-1">
                                <form action="{{route('customer.edit', $customer->identificacion)}}" method="post">
                                    @csrf
                                        <button class="btn btn-warning btn-sm" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                        <i>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-400v-80h280v80H160Zm0-160v-80h440v80H160Zm0-160v-80h440v80H160Zm360 560v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z"/></svg>
                                        </i>
                                        </button>
                                    </a>
                                </form>
                            </td>
                            <td class="col-md-1">
                                <form action="{{route('customer.destroy', $customer->identificacion)}}" method="post">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm eliminar" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar">
                                        <i>
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                        </i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>