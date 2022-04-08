<?php
    $dateNow = Carbon\Carbon::now();
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
    <link rel="stylesheet" href="style.css">
    <style>
        header p {
            text-align: center;
            font-size: small;
        }
        header img {
            height:80px;
            margin-left:50px;
        }
        .fecha p {
            text-align: right;
            font-size:15px;
            margin-top:30px;
        }
        .firma {
            margin-top: 280px;
            margin-left: 285px;
        }
        .firma img {
            margin-left:-15px;
        }
        .nombre {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }
        .nombre2 {
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            margin-left:-100px;
        }
        footer img {
            height:100px;
            margin-top:150px;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <header>
        <p style="font-size: 11px;" >2022 "Año del Quincentenario de la Funcion de Toluca de Lerdo, Capital del Estado de Mexico"</p>
        <table>
            <tr>
                <td>
                    <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/HAyuntamiento.jpeg';?>" alt="">
                </td>
                <td>
                    <span style="border: 0px; background-color: #54191b; height: 8px; border-radius: 3px; width: 350px; display: block;"></span>
                </td>
            </tr>
        </table>
    </header>
    <div class="fecha">
        <p>
            Nicolás Romero, Estado de México, a
            {{ "{$day} de {$monthName} de {$year}." }}
        </p>
    </div>
    <section style="text-align: center; margin-top: 300px">
    <table>
        <tr>
            <td style="text-align: center;">
                <p style="font-weight: bold;">ATENTAMENTE</p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <img src="data:image/png;base64, {!! $qrCode !!}"" alt="dddd">
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <p style="  font-size:12px;">
                    {{ base64_encode("{$employee['name']} {$employee['first_surname']} {$employee['second_surname']} {$position['name']} {$employee['employee_number']} {$dateNow}") }}
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
                    {{ $position['name'] }}
                </p>
            </td>
        </tr>
    </table>
    </section>
    <footer>
        <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/GobMunicipal-2022-2024.jpeg';?>" alt="">
    </footer>
</body>
</html>