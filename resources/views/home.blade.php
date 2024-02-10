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
       <div class="container-table">
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
                            <td>
                                <form id="{{$item->id}}" action="{{route('complete', $item->id)}}">
                                    <input type="checkbox" id="{{$item->id}}" onchange="handleChange(this)" {{$item->completado==0?null:'disabled checked'}} />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $homeworks->links() }}
        </div>
    </body>
    <script>
        function handleChange(data) {
            const id = data.id;
            document.getElementById(id).submit();
        }
    </script>
</html>