<?php
include("responsable.class.php");

class Proprietaire extends Cavalier{
    private $assurance;
    public function __construct($id_cavalier, $nom_cav, $prenom_cav, $numlicence, $photo, $datena,$assurance){
        parent::__construct($id_cavalier, $nom_cav, $prenom_cav, $numlicence, $photo, $datena);
        $this->assurance = $assurance;
    }
    public function get_assurance(){
        return $this->assurance;
    }
    public function set_assurance($assurance){
        $this->assurance = $assurance;
    }
    public function test($id_cavalier){
        if($id_cavalier == "$test_res.id_cavalier"){
            $obj_merged = (object) array_merge(
                (array) self, (array) $test_res);
        }
    }
}