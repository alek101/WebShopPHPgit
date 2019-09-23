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
    <!-- <div class='okvir'>
    <pre>
    Napraviti web-shop.

        Proizvodi klasu Proizvodi u MVC, koja ce imati listu proizvoda kao niz:

        [

        { id:1, naziv:"sto", slika:"sto.jpg", cena:500, kolicine:["zuta":20, "crvena":11, ... ]},

        { id:5, naziv:"stolica", "slika":"stolica.jpg", cena:300, kolicine:["zuta":10, "crvena":25, ... ]},  //boje ne moraju biti iste svuda

        ...

        ]

        I metode :

        lista_prikaz: koja prikazuje  naziv, cenu,  <select> polje koja ima sve boje cija je kol>0.  

        dugme kupi(kasnije poziva korpa.kupi)  i  dugme detaljnije (koja otvara stranicu detaljnije.php).

        ceo_prikaz:  koja prikazuje:

        naziv, cenu, sliku, <select> polje koja ima sve boje cija je kol>0 , dugme kupi i  dugme obrisi iz korpe.



        NApraviti class korpa (u mvc), koja u sesiji pamti id-eve i boje proizvoda koje su kupljene.

        Npr, posle kupovine korpa u sesiji moze izgledati ovako: 

        $_SESSION['korpa'] = [

        "1" : { 'zelena':1, 'crvena:2 },  //znaci proizvod sa id-jem 1 ima kupljen u zelenoj boji 1, u crvenoj 2.

        "5" : { "zuta' : 1}  ....

        ]

        Metode: dodaj, obrisi, prikazi_korpu, prikazi_ukupnu_cenu.... dodati po potrebi kasnije jos ako treba.



        Napraviti stranicu korpa koja prikazuje listu svih proizvoda u korpi, zajedno sa ukupnom sumom i velikim dugmetom kupi, koja resetuje sesiju, i vraca kupca na pocetnu stranicu.
    </pre>
    </div> -->

    <div class="okvir">
        <a href="korpaStranica.php">Korpa</a>
    </div>
    
    <div class="okvir">
        <div class="container">
            <div class="filter">
                Претрaжуј према називу: <input type="text" id="ime_filter"> <br>
                <button class="dugme filterNaziv">Филтер-Назив</button> <br>
                Постави минималну цену: <input type="number" class="min_max"> <br>
                Постави максималну цену: <input type="number" class="min_max"> <br>
                <button class="dugme filterCena">Филтер-Цена</button>
            </div>
            <div class="products">
                <?php
                    $view->prikaziSveProizvodeKrace();
                ?>
            </div>
        </div>
    </div>

    <div class="okvir rezultat"></div>
    
    <script src='script.js'></script>
</body>
</html>