<?php

class Cavalier{
    private $id_cavalier;
    private $nom_cav;
    private $prenom_cav;
    private $numlicence;
    private $photo;
    private $datena;
    private $idgalop;
    function __construct($id_cavalier, $nom_cav, $prenom_cav, $numlicence, $photo, $datena, $idgalop){
        $this->id_cavalier = $id_cavalier;
        $this->nom_cav = $nom_cav;
        $this->prenom_cav = $prenom_cav;
        $this->numlicence = $numlicence;
        $this->photo = $photo;
        $this->datena = $datena;
        $this->idgalop = $idgalop;
    }
    public function getIdCav(){
        return $this->id_cavalier;
    }
    public function getNomCav(){
        return $this->nom_cav;
    }
    public function set_NomCav($nom_cav){
        $this->nom_cav = $nom_cav;
    }
    public function getPrenom_cav(){
        return $this->prenom_cav;
    }
    public function set_prenom_cav($prenom_cav){
        $this->prenom_cav = $prenom_cav;
    }
    public function getNumLicence(){
        return $this->numlicence;
    }
    public function setNumLicence($numLicence){
        $this->numlicence = $numLicence;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function set_photo($photo){
        $this->photo = $photo;
    }
    public function getDatena(){
        return $this->datena;
    }
    public function setDatena($datena){
        $this->datena = $datena;
    }
    //crud
    public function cavalier_ajout($a, $b, $c, $d, $e, $f, $con){
        $sql = "INSERT INTO cavalier (nomcav, prenomcav, numlicence, photo, datena, idgalop)
                    VALUES (:nomcav, :prenomcav, :numlicence, :photo, :datena, :idgalop)";
        $stmt = $con->prepare($sql);

            $data = [
                ':nomcav' => $a,
                ':prenomcav' => $b,
                ':numlicence' => $c,
                ':photo' => $d,
                ':datena' => $e,
                ':idgalop' => $f
            ];
        
        $stmt->execute($data);
            echo "Client inséré avec succès dans la base de données.<br>";
    }
    /*public function cavalier_modifier($a,$b,$c,$con){
        $data = [
            ':idcavalier' => $a,
            ':valeur' => $b,
        ];
    
        $sql=  "UPDATE cavalier
                SET $c = :valeur
                WHERE idcavalier = :idcavalier;";
        $stmt= $con->prepare($sql);
    
        //Teste si les données ont bien été mises à jour
        if($stmt->execute($data)){
            echo "Bien modifié";
        return true;
        }
        else {
            echo $stmt->errorInfo();
        return false;
        }
    }*/
}