<?php
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>programas</title>

</head>

<body>
<table border = "2">

    <thead>
        <tr>
            <th>NIS</th>
            <th>Codigo</th>
            <th>Denominacion</th>
            <th>observaciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($programasdeformacion as $programas)
        <tr>
            <td>{{$programas->NIS}}</td>
            <td>{{$programas->codigo}}</td>
            <td>{{$programas->denominacion}}</td>
            <td>{{$programas->observaciones}}</td>

        </tr>

    @endforeach
    </tbody>
</table>
<a href ="{{route('programas.create')}}">Anadir programa de formacion</a>
</body>
</html>
