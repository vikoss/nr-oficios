<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificacion</title>
</head>
<body>
    <h1 style="font-weight: 400; font-size: 22px; text-align: justify;">Hola tienes una nueva notificacion puedes revisarla entrando al siguiente enlace:</h1>
    <a href="{{ asset('validacion/'.$email['id']) }}" target="_blank" rel="noopener noreferrer">
        <img src="{{ asset('images/document.png') }}" alt="">
    </a>
    <a href="{{ asset('validacion/'.$email['id']) }}" target="_blank" rel="noopener noreferrer" style="color: #54191b;">
        <h2 style="font-weight: 200; color: #54191b; font-size: 32px; text-align: center;">ABRIR</h2>
    </a>
</body>
</html>