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
    <title>Document</title>
</head>
<body>
<form method = "POST" action = "{{route('regionales.store')}}" enctype="multipart/form-data">
@csrf

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Codigo</label>
        <input name="codigo" type="number" class="form-control" id="exampleFormControlInput1" placeholder="ficha de caracterizacion">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">denminacion</label>
        <input name ="denominacion" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre de formacion">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">observaciones</label>
        <input name = "observaciones" type="text" class="form-control" id="exampleFormControlInput1" placeholder="observaciones">
    </div>


    <button type="submit">subir</button>

</form>
</body>
</html>

