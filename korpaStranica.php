<?php
    require_once "View/viewKorpa.php";
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prodavnica namestaja</title>
    <link rel="stylesheet" href="plaviStWebShop.css">
    <link rel="stylesheet" href="webShopPHP.css">
</head>
<body>
    
    <div class='okvir'>
        <table>

        <tr>
            <th>Ime</th>
            <th>Boja</th>
            <th>Cena</th>
            <th>Kolicina</th>
            <th>Cena po tipu</th>
            <th>Obrisi</th>
        </tr>
       
        <?php
        $viewKorpa->napraviTabelu();
        ?>

        </table>

        <p> Ukupna cena je: <?php echo $korpa->ukupnaCena(); ?> necega. </p>

        <p><button class="dugme kupi">Kupi</button></p>
        <p>
            <a href="index.php">Povratak</a>
        </p>
    </div>

    <script src='script2.js'></script>
</body>
</html>