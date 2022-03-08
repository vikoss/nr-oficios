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
            height:60px;
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
            margin-top:210px;
        }
    </style>
    <title>Document</title>
</head>
<body>
<header>
        <p>2022 "Año del Quincentenario de la Funcion de Toluca de Lerdo, Capital del Estado de Mexico"</p>
        <div>
            <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/logo.png';?>" alt="">
        </div>
    </header>
    <div class="fecha">
        <p>Nicolas Romero, Estado de Mexico, a 01 de febrero de 2022.</p>
    </div>
    <section class="firma">
        <p class="nombre">ATENTAMENTE</p>
        <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/QR.jpeg';?>" alt="">
        <p class="nombre2">MTRO. GILBERTO HERNAN CONDE ZARATE</p>
        <P class="nombre">OFICIAL MAYOR </P>
    </section>
    
    <footer>
        <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/images/NR.jpeg';?>" alt="">
    </footer>
</body>
</html>