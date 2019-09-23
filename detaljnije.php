<?php
    require_once "View/viewWeb.php";
    
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
    
    <div class='proizvodDetaljnije okvir'>
            <?php
            $id=$_GET['id'];
            $view->prikaziProizvodDuze($id);
            ?>
            
    </div>
    
    <div class="okvir rezultat"></div>

    <script src='script.js'></script>
</body>
</html>