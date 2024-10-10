<?php

class Cours{
    private $id_cours;
    private $libcours;
    private $heure_debut;
    private $heure_fin;
    private $jour;

    public function __construct( $id_cours, $libcours, $heure_debut, $heure_fin, $jour) {
        $this->id_cours = $id_cours;
        $this->libcours = $libcours;
        $this->heure_debut = $heure_debut;
        $this->heure_fin = $heure_fin;
        $this->jour = $jour;
    }
    public function getIdcours() {
        return $this->id_cours;
    }
    public function getLibcours() {
        return $this->libcours;
    }
    public function set_libcours($libcours) {
        $this->libcours = $libcours;
    }
    public function getHeureDebut() {
        return $this->heure_debut;
    }
    public function set_heure_debut($heure_debut) {
        $this->heure_debut = $heure_debut;
    }
    public function getHeureFin() {
        return $this->heure_fin;
    }
    public function set_HeureFin($heure_fin) {
        $this->heure_fin = $heure_fin;
    }
    public function getJour() {
        return $this->jour;
    }
    public function set_jour($jour) {
        $this->jour = $jour;
    }
}