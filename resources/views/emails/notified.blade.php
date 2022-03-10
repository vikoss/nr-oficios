<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Hola tienes una nueva notificacion puedes revisarla entrando al siguiente enlace:</h1>
    <h2>{{ asset('storage'.$notification['document']) }}</h2>
    <h1>Recuerda validar de recibido entrando al siguiente enlace:</h1>
    <h2>{{ asset('validacion/'.$email['id']) }}</h2>
    <h2>{{ $email['id'] }}</h2>
</body>
</html>