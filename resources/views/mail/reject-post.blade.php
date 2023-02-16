<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Este es un correo electronico de Prueba</h1>
    <p>EL post <strong>{{$post->name}}</strong> fue reprobado no cumple con los parametros ni requsitos minimos<p>
        <h3>Motivo del rechazo</h3>
        {!!$post->observation->body!!}
</body>
</html>