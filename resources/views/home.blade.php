<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Panel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
       @include('layauts.navbar')
       <div class="container-flex">
            <table class="table">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th><button class="btn btn-primary" onclick="window.location.href='{{route('addHomeworks')}}'">Añadir Tarea</button></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($homeworks as $item)
                        <tr>
                            <td>{{$item->titulo}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->fecha_vencimiento}}</td>
                            <td><input type="checkbox" {{$item->completado==0?null:'disabled checked'}} /></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $homeworks->links() }}
        </div>
    </body>
</html>