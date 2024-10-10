<?php

class Cavalerie{
    private $Numsire;
    private $nom_cheval;
    private $datenacheval;
    private $garot;
    private $id_race;
    private $id_robe;
    private $id_photo;
    //id_pention à ajouter ici
    public function __construct($Numsire, $nom_cheval, $datenacheval, $garot, $id_race, $id_robe, $id_photo){
        $this->Numsire = $Numsire;
        $this->nom_cheval = $nom_cheval;
        $this->datenacheval = $datenacheval;
        $this->garot = $garot;
        $this->id_race = $id_race;
        $this->id_robe = $id_robe;
        $this->id_photo = $id_photo;
    }
    public function get_numsire(){
        return $this->Numsire;
    }
    public function get_nom_cheval(){
        return $this->nom_cheval;
    }
    public function set_nom_cheval($nom_cheval){
        $this->nom_cheval = $nom_cheval;
    }
    public function get_datenacheval(){
        return $this->datenacheval;
    }
    public function set_datenacheval($datenacheval){
        $this->datenacheval = $datenacheval;
    }
    public function get_garot(){
        return $this->garot;
    }
    public function set_garot( $garot ){
        $this->garot = $garot;
    }
    public function get_id_race(){
        return $this->id_race;
    }
    public function set_id_race( $id_race ){
        $this->id_race = $id_race;
    }
    public function get_id_robe(){
        return $this->id_robe;
    }
    public function set_id_robe( $id_robe ){
        $this->id_robe = $id_robe;
    }
    public function get_id_photo(){
        return $this->id_photo;
    }
    public function set_id_photo( $id_photo ){
        $this->id_photo = $id_photo;
    }
}