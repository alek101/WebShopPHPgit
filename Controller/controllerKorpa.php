<?php
 require_once "korpa.php";

 if (!isset($_GET['metoda']))
 {
     die("nema metode");
 }
 else
 {
     $metoda=$_GET['metoda'];
     if($metoda==='kupi')
     {
        $_SESSION['korpa']=[];

        echo "Korpa je obrisana";
     }
     elseif($metoda==='obrisi')
     {
         if(!isset($_GET['id']) || !isset($_GET['boja']))
         {
             die("nedostaju podaci");
         }
         else
         {
             $id=$_GET['id'];
             $boja=$_GET['boja'];
             $korpa->obrisiIzKorpe($id,$boja);
             $naziv=($modelWeb->vratiProizvodID($id))['naziv'];
             echo "Iz korpe je obrisan $naziv sa bojom $boja!";
         }
     }

 }

 


?>