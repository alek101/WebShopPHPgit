<?php
    require_once('C:\xampp\htdocs\AleksandarPHP2\domaciPHP\WebShop\Model\modelWeb.php');
   
    class ViewWeb
    {
        private $model;

        public function __construct($model)
        {
            $this->model=$model; //ovo je objekat!!!
        }

        public function prikaziOpcije($proizvod,$id)
        {
            $x=$this->model->izvuciBoje($proizvod);
            $rez="<select id='select-$id'>";
            forEach($x as $boja)
            {
                $rez.="<option value='$boja'>$boja</option>";
            }
            $rez.="</select>";
            return $rez;
        }

        public function prikaziProizvodKrace($proizvod)
        {
            $ind=$proizvod['id'];
            echo "<div class='item'> <p class='namePr'>". $proizvod['naziv']." </p>
                <p><img src='Slike/".$proizvod['slika']."' alt='nema' width='120px' height='120px'></p>
                <p class='cena'> Cena: ".$proizvod['cena'] ."</p>
                <p><a href='detaljnije.php?id=$ind'> Detaljnije </a></p>
                ".$this->prikaziOpcije($proizvod,$ind)."
                <p>
                <button class='dugme dodaj' data-index='$ind'> Korpa+ </button>
                <button class='dugme izvadi' data-index='$ind'> Korpa- </button>
                </p>
                </div>";
        }

        public function stampajNizProizvodaID($nizID)
        {
            forEach($nizID as $id)
            {
                $proizvod=$this->model->vratiProizvodID($id);
                $this->prikaziProizvodKrace($proizvod);
            }
        }

        public function prikaziSveproizvodeKrace()
        {
            $nizID=$this->model->izvuciID();
            $this->stampajNizProizvodaID($nizID);
            
        }

        public function prikaziProizvodDuze($id)
        {
            $proizvod=$this->model->vratiProizvodID($id);
            $ind=$proizvod['id'];
            echo "<div class='itemL'><p class='nameL'>". $proizvod['naziv']." </p> 
                <p><img src='Slike/".$proizvod['slika']."' alt='nema' width='720px' height='720px'></p>
                <p class='cena'> Cena: ".$proizvod['cena'] ."</p>
                <p><a href='index.php'> Nazad </a></p>
                ".$this->prikaziOpcije($proizvod,$ind)."
                <p><button class='dugme dodaj' data-index='$ind'> Korpa+ </button>
                <button class='dugme izvadi' data-index='$ind'> Korpa- </button></p>
                <p><a href='korpaStranica.php'>Korpa</a></p>
                </div>";
        }

        public function prikaziProizvodePremaCeni($min,$max)
        {
            $nizID=$this->model->filterCena($min,$max);
            $this->stampajNizProizvodaID($nizID);
        }

        public function prikaziProizvodePremaNazivu($rec)
        {
            $nizID=$this->model->filterNaziv($rec);
            $this->stampajNizProizvodaID($nizID);
        }
    }


    $view=new ViewWeb($modelWeb);


?>