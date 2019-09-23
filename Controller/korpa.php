<?php
session_start();

require_once('C:\xampp\htdocs\AleksandarPHP2\domaciPHP\WebShop\Model\modelWeb.php');

class Korpa
{
    private $korpa=[];

    public function __construct($korpa)
    {
        $this->korpa=$korpa;
    }

    public function dodajUKorpu($id,$boja,$kolicina=1)
    {
        if(!isset($this->korpa[$id]))
        {
            $this->korpa[$id]=[$boja=>$kolicina];
        }
        else
        {
            if(!isset($this->korpa[$id][$boja]))
            {
                $this->korpa[$id]+=[$boja=>$kolicina];
            }
            else{
                $this->korpa[$id][$boja]+=$kolicina;
            }
        }

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
}

if(isset($_SESSION['korpa']))
{
    $korpaD=$_SESSION['korpa'];
}
else{
    $korpaD=[]; 
}


$korpa=new Korpa($korpaD);

// $korpa->dodajUKorpu('3','zuta',2);
// $korpa->dodajUKorpu('3','zuta',1);
// $korpa->dodajUKorpu('3','crvena',2);
// $korpa->dodajUKorpu('pera','zuta',2);
// $korpa->dodajUKorpu('pera','ljubicasta',2);
// $korpa->dodajUKorpu('pera','ljubicasta',-2);
// $korpa->dodajUKorpu('pera','ljubicasta',0);

?>