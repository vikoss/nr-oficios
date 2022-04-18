<?php
    use Carbon\Carbon;
    $dateNow = Carbon::now();
    $monthName = $dateNow->monthName;
    $day = $dateNow->day;
    $year = $dateNow->year;
?>

<!DOCTYPE html>
<html lang="en" style="margin: 0; padding: 0; ">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de emails validados</title>
</head>
<body background="./../public/images/FondeDePantalla.jpeg" style="background-size:cover; background-repeat: no-repeat; heigth:100%; width: 100%; margin-left:15px; ">
    <div style="margin-bottom: 100px;">
        <p style="margin-top: 150px; text-align: right; margin-right: 25px;">
            Nicolás Romero, Estado de México, a
            {{ "{$day} de {$monthName} de {$year}." }}
        </p>
    </div>
<table style="width: 90%; font-size: 12px; text-align: center; border-spacing: 20px; border-collapse: separate;" >
  <tr style="text-align: center; color: #54191b;">
    <th>Fecha de registro</th>
    <th>Fecha de envio</th>
    <th>Para</th>
    <th>Validado de recibido</th>
  </tr>
  @foreach ($emails as $email)
  <tr>
    <td style="border-left: 10px solid #54191b; border-radius: 5px;">{{ Carbon::createFromDate($email['created_at'])->toDateTimeString() }}</td>
    <td>{{ Carbon::createFromDate($email['sent_at'])->toDateTimeString() }}</td>
    <td>{{ $email['to'] }}</td>
    <td>{{ $email['verified_at'] ? Carbon::createFromDate($email['verified_at'])->toDateTimeString() : 'No' }}</td>
  </tr>
  @endforeach
</table>

</body>
</html>