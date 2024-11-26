<?php
class Cavalerie {
    private $numsire;
    private $nom_cheval;
    private $datenacheval;
    private $garot;
    private $id_race;
    private $id_robe;
    private $photo_path;

    public function __construct($numsire, $nom_cheval, $datenacheval, $garot, $id_race, $id_robe, $photo_path) {
        $this->numsire = $numsire;
        $this->nom_cheval = $nom_cheval;
        $this->datenacheval = $datenacheval;
        $this->garot = $garot;
        $this->id_race = $id_race;
        $this->id_robe = $id_robe;
        $this->photo_path = $photo_path;
    }

    public function cavalerie_ajout($numsire, $nom_cheval, $datenacheval, $garot, $id_race, $id_robe, $photo_path, $con) {
        $sql = "INSERT INTO cavalerie (numsire, nomcheval, datenacheval, garot, idrace, idrobe, photo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("issdiii", $numsire, $nom_cheval, $datenacheval, $garot, $id_race, $id_robe, $photo_path);
        if ($stmt->execute()) {
            echo "Nouvel enregistrement créé avec succès";
        } else {
            echo "Erreur: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>
