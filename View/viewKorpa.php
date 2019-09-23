<?php
    
    require_once "Controller/korpa.php";
  

    class ViewKorpa
    {
        private $korpaS=[];        
        private $model;

        public function __construct($korpaS,$model)
        {
            $this->korpaS=$korpaS;
            $this->model=$model;
        }

        public function napraviTabelu()
        {
            $rez="";
            forEach($this->korpaS as $id=>$proizvodKorpa)
            {
                $proizvod=$this->model->vratiProizvodID($id);
                $ime=$proizvod['naziv'];
                $cena=$proizvod['cena'];
                forEach($proizvodKorpa as $boja=>$kolicina)
                {
                    $pojedinacnaCena=$kolicina*$cena;
                    $rez.="<tr>";
                    $rez.="<td>$ime</td>";
                    $rez.="<td>$boja</td>";
                    $rez.="<td>$cena</td>";
                    $rez.="<td>$kolicina</td>";
                    $rez.="<td>$pojedinacnaCena</td>";
                    $rez.="<td><button class='maloDugme brisi' data-dugme='$id&$boja'>X</button></td>";
                    $rez.="</tr>";
                }
            }
            echo $rez;
        }

        public function ukupnaCena()
        {
            $rez=0;
            forEach($this->korpaS as $id=>$proizvodKorpa)
            {
                $proizvod=$this->model->vratiProizvodID($id);
                $cena=$proizvod['cena'];
                forEach($proizvodKorpa as $boja=>$kolicina)
                {
                    $rez+=$kolicina*$cena;
                }
            }
            return $rez;
        }

    }


    $viewKorpa=new ViewKorpa($korpaD,$modelWeb);

?>