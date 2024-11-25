<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configurar Servicios</title>

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
                <form class="row g-3" action="{{route('service.store')}}" method="post">
                    @csrf
                    @method('POST')
                    <h1>Información de Servicios</h1>
                    <input type="hidden" name="identificacion" value="{{ session('identificacion') }}">
                    <div class="col-md-6">
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="checkbox" name="servicio[]" value="Internet 200 MB" id="internet200">
                            <label class="form-check-label" for="internet200">Internet 200 MB</label>
                        </div>
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="checkbox" name="servicio[]" value="Internet 400 MB" id="internet400">
                            <label class="form-check-label" for="internet400">Internet 400 MB</label>
                        </div>
                        <div class="form-check col-md-12">
                            <input class="form-check-input" type="checkbox" name="servicio[]" value="Internet 600 MB" id="internet600">
                            <label class="form-check-label" for="internet600">Internet 600 MB</label>
                        </div>
                        <div class="form-check col-md-12">
                            <input class="form-check-input" type="checkbox" name="servicio[]" value="Directv Go" id="directvgo">
                            <label class="form-check-label" for="directvgo">Directv Go</label>
                        </div>
                        <div class="form-check col-md-12">
                            <input class="form-check-input" type="checkbox" name="servicio[]" value="Paramount+" id="paramount">
                            <label class="form-check-label" for="paramount">Paramount+</label>
                        </div>
                        <div class="form-check col-md-12">
                            <input class="form-check-input" type="checkbox" name="servicio[]" value="Win+" id="win">
                            <label class="form-check-label" for="win">Win+</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary guardar m-2">Configurar Servicios</button>
                        <a class="btn btn-danger m-2" href="{{route('index')}}" role="button">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
