<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senso Medico - Profesiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h4>Gestion de Profesiones u Oficio</h4>
        <div class="row">
            <div class="col-xl-12">
                <form action="{{route('profesion.index')}}" method="get">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <div class="col-auto my-1">
                            <a href="{{route('profesion.create')}}" class="btn btn-success">Nuevo</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>opciones</th>
                                <th>Id</th>
                                <th>Profesion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($profesiones)<=0) <tr>
                                <td colspan="3" align="center">No hay resultados</td>
                                </tr>
                                @else
                                @foreach ($profesiones as $profesion)
                                <tr>
                                    <td><a href="{{route('profesion.edit', $profesion->id_profesion)}}" class="btn btn-warning btn-sm">Editar</a> |
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$profesion->id_profesion}}">
                                            Eliminar
                                        </button>
                                    </td>
                                    <td>{{$profesion->id_profesion}}</td>
                                    <td>{{$profesion->profesion}}</td>
                                </tr>
                                @include('profesion.delete')
                                @endforeach
                                @endif
                        </tbody>
                    </table>
                    {{$profesiones->links()}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>