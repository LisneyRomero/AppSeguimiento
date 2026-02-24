<?php
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Regionales</title>
    <div class = container>
    <table  class = table>

        <tread>

            <tr>
                <th>NIS</th>
                <th>Codigo</th>
                <th>Denominacion</th>
                <th>observaciones</th>
            </tr>
        </tread>
        <tbody>
        @foreach($regionales  as $regional)
            <tr>
                <td>{{$regional->NIS}}</td>
                <td>{{$regional->codigo}}</td>
                <td>{{$regional->denominacion}}</td>
                <td>{{$regional->observaciones}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <a href ="{{route('programas.index')}}">Consultar Programas de formacion</a>
    <a href ="{{route('regionales.create')}}">agregar regionles</a>




</head>
<body>

</body>
</html>
