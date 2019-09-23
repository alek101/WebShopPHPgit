<?php
require_once "../View/viewWeb.php";

if(!isset($_GET['filter']))
{
    die("");
}
elseif($_GET['filter']==="cena")
{
    if(!isset($_GET['min']) or !isset($_GET['max']))
    {
        die("");
    }
    else{
        $min=$_GET['min'];
        $max=$_GET['max'];

    $view->prikaziProizvodePremaCeni($min,$max);
    }
}
elseif($_GET['filter']==="naziv")
{
    if(!isset($_GET['rec']))
    {
        die("");
    }
    else{
        $rec=$_GET['rec'];

    $view->prikaziProizvodePremaNazivu($rec);
    }
}


?>