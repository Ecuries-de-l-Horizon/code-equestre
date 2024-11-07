<?php
include("responsable.class.php");

class Proprietaire extends Cavalier{
    private $assurance;
    public function __construct($id_cavalier, $nom_cav, $prenom_cav, $numlicence, $photo, $datena, $idgalop, $assurance){
        parent::__construct($id_cavalier, $nom_cav, $prenom_cav, $numlicence, $photo, $datena, $idgalop);
        $this->assurance = $assurance;
    }
    public function get_assurance(){
        return $this->assurance;
    }
    public function set_assurance($assurance){
        $this->assurance = $assurance;
    }
    public function prop_ajout($a, $b, $c, $d, $e, $f,$g, $con){
        $sql = "INSERT INTO cavalier (nomcav, prenomcav, numlicence, photo, datena, idgalop, assurance)
                    VALUES (:nomcav, :prenomcav, :numlicence, :photo, :datena, :idgalop, :assurance)";
        $stmt = $con->prepare($sql);

            $data = [
                ':nomcav' => $a,
                ':prenomcav' => $b,
                ':numlicence' => $c,
                ':photo' => $d,
                ':datena' => $e,
                ':idgalop' => $f,
                ':assurance' => $g
            ];
        
        $stmt->execute($data);
            echo "Client inséré avec succès dans la base de données.<br>";
    }
}