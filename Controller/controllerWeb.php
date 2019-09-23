<?php
require_once "korpa.php";


if(!isset($_GET['id']) or !isset($_GET['boja']) or !isset($_GET['kolicina']))
{
    die("");
}
else{
    $id=$_GET['id'];
    $boja=$_GET['boja'];
    $kolicina=$_GET['kolicina'];

    $korpa->dodajUKorpu($id,$boja,$kolicina);

    echo "Dodato";
}

?>