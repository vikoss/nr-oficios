<?php
    $dateNow = Carbon\Carbon::now();
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
    <title>Document</title>
</head>
<body background="./../public/images/FondeDePantalla.jpeg" style="background-size:cover; background-repeat: no-repeat; heigth:100%; width: 100%; margin-left:15px; ">
    <div style="margin-bottom: 100px;">
        <p style="margin-top: 150px; text-align: right; margin-right: 25px;">
            Nicolás Romero, Estado de México, a
            {{ "{$day} de {$monthName} de {$year}." }}
        </p>
    </div>
<table style="width:90% text-align: center" >
  <tr style="text-align: center; color: #54191b;">
    <th>Fecha de registro</th>
    <th>Fecha de envio</th>
    <th>Para</th>
    <th>Validado de recibido</th>
  </tr>
  <tr style="text-align: center;">
    <td style="border-left:10px solid #54191b; height: 71px;">2022-04-08</td>
    <td>2022-04-08</td>
    <td>Vikoss.yiss@gmail.com</td>
    <td>si/no</td>
  </tr>
</table>

</body>
</html>