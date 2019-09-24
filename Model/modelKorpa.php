<?php
session_start();

//aktivira se sesija na startu

//neophodna je apsolutna putanja
require_once('C:\xampp\htdocs\AleksandarPHP2\domaciPHP\WebShop\Model\modelWeb.php');

class Korpa
{
    private $korpa=[];
    private $model;

    public function __construct($model,$korpa)
    {
        $this->model=$model;
        $this->korpa=$korpa;
    }

    public function dodajUKorpu($id,$boja,$kolicina=1)
    {
        //ako nema takvog proizvoda u korpi dodaj proizvod
        if(!isset($this->korpa[$id]))
        {
            $this->korpa[$id]=[$boja=>$kolicina];
        }
        else
        {
            //ako postoji proizvod, ali ne i ta boja-dodaj boju
            if(!isset($this->korpa[$id][$boja]))
            {
                $this->korpa[$id]+=[$boja=>$kolicina];
            }
            else{
                //ako postoji iproizvod i boja, dodaj
                $this->korpa[$id][$boja]+=$kolicina;
            }
        }

        //ako kolicina proizvoda padne na 0 ili manje, obrisi iz korpe
        if($this->korpa[$id][$boja]<=0)
        {
            unset($this->korpa[$id][$boja]);
        }
        $_SESSION['korpa']=$this->korpa;
    }

    public function obrisiIzKorpe($id,$boja)
    {
        unset($this->korpa[$id][$boja]);
        $_SESSION['korpa']=$this->korpa;
    }

    public function ukupnaCena()
    {
        $rez=0;
        forEach($this->korpa as $id=>$proizvodKorpa)
        {
            $proizvod=$this->model->vratiProizvod($id);
            $cena=$proizvod['cena'];
            forEach($proizvodKorpa as $kolicina)
            {
                $rez+=$kolicina*$cena;
            }
        }
        return $rez;
    }
}

if(isset($_SESSION['korpa']))
{
    $korpaD=$_SESSION['korpa'];
}
else{
    $korpaD=[]; 
}


$korpa=new Korpa($modelWeb,$korpaD);

// $korpa->dodajUKorpu('3','zuta',2);
// $korpa->dodajUKorpu('3','zuta',1);
// $korpa->dodajUKorpu('3','crvena',2);
// $korpa->dodajUKorpu('pera','zuta',2);
// $korpa->dodajUKorpu('pera','ljubicasta',2);
// $korpa->dodajUKorpu('pera','ljubicasta',-2);
// $korpa->dodajUKorpu('pera','ljubicasta',0);

?>