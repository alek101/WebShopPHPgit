<?php
    // define("BAZA",dirname(__FILE__).'/');
    // echo BAZA;

    //baza popdataka
    $proizvodiBaza=[
        ['id'=>1, 'naziv'=>'sto', 'slika'=>'sto.jpg', 'cena'=>500, 'kolicina'=>['crna'=>10, 'bela'=>8, 'zuta'=>3, 'bezz'=>12, 'tropska paprika'=>0]],
        ['id'=>5, 'naziv'=>'stolica', 'slika'=>'stolica.jpg', 'cena'=>300, 'kolicina'=>['crna'=>23, 'bela'=>16, 'zuta'=>10, 'bezz'=>0, 'tropska paprika'=>5]],
        ['id'=>14, 'naziv'=>'trosed', 'slika'=>'trosed.jpg', 'cena'=>1300, 'kolicina'=>['crna'=>30, 'bela'=>6, 'zuta'=>13, 'bezz'=>5, 'tropska paprika'=>2]],
    ];

    //
    class WebModel
    {
        private $proizvodi;

        public function __construct($proizvodi)
        {
            $this->proizvodi=$proizvodi;
        }

        public function vratiProizvodID($id)
        {
            forEach($this->proizvodi as $proizvod)
            {
                if($proizvod['id']==$id)
                {
                    return $proizvod;
                }
            }
        }

        // public function filterID($id)
        // {
        //     //uvek vraca niz!!!!
        //     return array_filter($this->proizvodi, function ($proizvod) use ($id)
        //     {
        //         if($proizvod['id']==$id)
        //         {
        //             return $proizvod;
        //         }
        //     });
        // }

        public function filterKolicine($proizvod,$kriterijum=0)
        {
            $niz=[];
            forEach($proizvod["kolicina"] as $boja=>$kol)
            {
                if($kol>$kriterijum)
                {
                    $niz[$boja]=$kol;
                }
            }
            return $niz;
        }

        public function izvuciBoje($proizvod,$kriterijum=0)
        {
            return array_keys($this->filterKolicine($proizvod,$kriterijum));
        }

        public function izvuciID()
        {
            return array_column($this->proizvodi, "id");
        }

        public function filterCena($min,$max)
        {
            $rezultat=[];
            foreach($this->proizvodi as $proizvod)
            {
                if($proizvod['cena']>=$min and $proizvod['cena']<=$max)
                {
                    array_push($rezultat,$proizvod['id']);
                }
            }
            return $rezultat;
        }

        public function filterNaziv($string)
        {
            $rezultat=[];
            foreach($this->proizvodi as $proizvod)
            {
                if(strpos($proizvod['naziv'],$string)>-1)
                {
                    array_push($rezultat,$proizvod['id']);
                }
            }
            return $rezultat;
        }
    }

    $modelWeb=new WebModel($proizvodiBaza);
    

?>