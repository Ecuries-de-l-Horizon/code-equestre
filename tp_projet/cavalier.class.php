<?php

class Cavalier{
    private $id_cavalier;
    private $nom_cav;
    private $prenom_cav;
    private $numlicence;
    private $photo;
    private $datena;
    function __construct($id_cavalier, $nom_cav, $prenom_cav, $numlicence, $photo, $datena){
        $this->id_cavalier = $id_cavalier;
        $this->nom_cav = $nom_cav;
        $this->prenom_cav = $prenom_cav;
        $this->numlicence = $numlicence;
        $this->photo = $photo;
        $this->datena = $datena;
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
}