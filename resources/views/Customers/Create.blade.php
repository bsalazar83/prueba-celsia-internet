<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Cliente</title>

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
            <div class="col-md-8 p-5">
                <form class="row g-3" action="{{route('customer.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <h3>Información del Cliente</h3>
                    <div class="col-md-6">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="nombres" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" required>
                    </div>
                    <div class="col-md-6">
                        <label for="identificacion" class="form-label">Identificación</label>
                        <input type="number" class="form-control" name="identificacion" required>
                    </div>
                    <div class="col-6">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="number" class="form-control" name="celular" required>
                    </div>
                    <div class="col-md-12">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" name="correo" size="35" required>
                    </div>
                    <div class="col-md-6">
                        <label for="tipoidentificacion" class="form-label">Tipo de Identificación</label>
                        <select name="tipoidentificacion" class="form-select" required>
                            <option value="">Seleccione el tipo de identificación</option>
                            <option value="CC">Cédula</option>
                            <option value="TI">Tarjeta de Identidad</option>
                            <option value="CE">Cédula de Extranjería</option>
                            <option value="RC">Registro Civil</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="fechanacimiento" class="form-label">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fechanacimiento" min="1900-01-01" max="2006-11-25" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary guardar m-2">Crear Cliente</button>
                        <a class="btn btn-danger m-2" href="{{route('index')}}" role="button">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
