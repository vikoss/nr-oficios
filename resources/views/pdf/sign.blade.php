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
    </style>
    <title>Document</title>
</head>
<body background="./../public/images/FondeDePantalla.jpeg" style="background-size:cover; background-repeat: no-repeat; heigth:100%; width: 100%; margin-left:15px; ">
    <div style="margin-bottom: 100px;">
        <p style="margin-top: 150px; text-align: right; margin-right: 25px; margin-bottom: 350px;">
            Tu Empresa, Estado de México, a
            {{ "{$day} de {$monthName} de {$year}." }}
        </p>
    </div>
    <table style="margin-left: auto; margin-right: auto;">
        <tr>
            <td>
                <p style="font-weight: bold; text-align: center;">ATENTAMENTE</p>
            </td>
        </tr>
    </table>
    @foreach ($employees as $employee)
    <table style="margin-left: auto; margin-right: auto;">
        <tr>
            <td style="text-align: center;">
                <img src="data:image/png;base64, {!! $employee['qr_code'] !!}" alt="Codigo QR">
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
            <!-- max width of characters(98) -->
                <p style="font-size:12px;">
                    {{ substr(
                        base64_encode("{$employee['name']} {$employee['first_surname']} {$employee['second_surname']} {$employee['position']['name']} {$employee['employee_number']} {$dateNow}"),
                        -98
                    ) }}
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <p style="font-weight: bold; margin-bottom: 0px;">
                    {{ "{$employee['name']} {$employee['first_surname']} {$employee['second_surname']}" }}
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <p style="font-weight: bold; font-size: 14px; margin-top: 0px;">
                    {{ $employee['position']['name'] }}
                </p>
            </td>
        </tr>
    </table>
    @endforeach
</body>
</html>