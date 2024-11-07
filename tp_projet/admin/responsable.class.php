<?php
include("cavalier.class.php");
class Responsable extends Cavalier{
    private $nom_res;
    private $prenom_res;
    private $rue_res;
    private $cp_res;
    private $tel_res;
    private $email_res;
    private $mdp_res;
    public function __construct($id_cavalier, $nom_cav, $prenom_cav, $numlicence, $photo, $datena, $idgalop,$nom_res,$prenom_res,$rue_res,$cp_res,$tel_res,$email_res,$mdp_res){
        parent::__construct($id_cavalier, $nom_cav, $prenom_cav, $numlicence, $photo, $datena, $idgalop);
        $this->nom_res=$nom_res;
        $this->prenom_res=$prenom_res;
        $this->rue_res=$rue_res;
        $this->cp_res=$cp_res;
        $this->tel_res=$tel_res;
        $this->email_res=$email_res;
        $this->mdp_res=$mdp_res;
    }
    public function getNom_Res(){
        return $this->nom_res;
    }
    public function getPrenom_Res(){
        return $this->prenom_res;
    }
    public function getRue_Res(){
        return $this->rue_res;
    }
    public function getCp_res(){
        return $this->cp_res;
    }
    public function getTel_res(){
        return $this->tel_res;
    }
    public function getEmail_Res(){
        return $this->email_res;
    }
    public function getMdp_res(){
        return $this->mdp_res;
    }

    public function res_ajout($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k, $l, $m, $con){
        $sql = "INSERT INTO cavalier (nomcav, prenomcav, numlicence, photo, datena, idgalop, nomres,prenomres,rueres,cpres,telres,mailres,mdp)
                    VALUES (:nomcav, :prenomcav, :numlicence, :photo, :datena, :idgalop, :nomres, :prenomres, :rueres, :cpres, :telres, :mailres, :mdp)";
        $stmt = $con->prepare($sql);

            $data = [
                ':nomcav' => $a,
                ':prenomcav' => $b,
                ':numlicence' => $c,
                ':photo' => $d,
                ':datena' => $e,
                ':idgalop' => $f,
                ':nomres' => $g,
                ':prenomres' => $h,
                ':rueres' => $i,
                ':cpres' => $j,
                ':telres'=> $k,
                ':mailres' => $l,
                ':mdp' => $m
            ];
        
        $stmt->execute($data);
            echo "Client inséré avec succès dans la base de données.<br>";
    }
}