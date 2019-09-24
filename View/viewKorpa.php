<?php
    
    require_once "Model/modelKorpa.php";
  

    class ViewKorpa
    {
        private $korpaS=[];        
        private $model;

        public function __construct($model,$korpaS)
        {
            $this->model=$model;
            $this->korpaS=$korpaS;
        }

        public function napraviTabelu()
        {
            $rez="";
            forEach($this->korpaS as $id=>$proizvodKorpa)
            {
                $proizvod=$this->model->vratiProizvod($id);
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

    }


    $viewKorpa=new ViewKorpa($modelWeb,$korpaD);

?>