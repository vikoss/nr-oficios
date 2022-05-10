<?php
    use Carbon\Carbon;
    $dateNow = Carbon::now();
    $monthName = $dateNow->monthName;
    $day = $dateNow->day;
    $year = $dateNow->year;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de emails validados</title>
    <style>
        html {
            margin: 0;
            padding: 0;
        }
        body {
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            width: 100%;
        }
        header {
            position: fixed;
            top: 100px;
            right: 50px;
            height: 100px;
        }
        main {
            position: relative;
            top: 150px;
            left: 0px;
            right: 0px;
            margin-bottom: 280px;
        }
        footer {
            position: fixed;
            left: 0px;
            right: 0px;
            bottom: 70px;
            height: 50px;
            text-align: center;
        }
        @page {
            margin: 0px 50px;
        }
        footer .page-number:before {
            content: counter(page);
        }
    </style>
</head>
<body background="./../public/images/FondeDePantalla.jpeg">
    <header>
        <p style="text-align: right; font-size: 14px;">
            Nicolás Romero, Estado de México, a
            {{ "{$day} de {$monthName} de {$year}." }}
        </p>
    </header>
    <main>
        <table style="width: 80%; font-size: 12px; text-align: center; margin: auto;">
            <tr style="text-align: center; color: #54191b;">
                <th>Id</th>
                <th>Fecha de registro</th>
                <th>Fecha de envio</th>
                <th>Para</th>
                <th>Validado de recibido</th>
            </tr>
            @foreach ($emails as $key => $email)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $email['created_at'] }}</td>
                <td>{{ $email['sent_at'] }}</td>
                <td>{{ $email['to'] }}</td>
                <td>{{ $email['verified_at'] ? $email['verified_at'] : 'No' }}</td>
            </tr>
            @endforeach
        </table>
    </main>
    <footer>
        <p style="font-weight: 500; font-size: 13px;">
            Página <span class="page-number"></span>
        </p>
    </footer>
</body>
</html>