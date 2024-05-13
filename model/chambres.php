<?php

class chambres {
    private $idOffre;
    private $typeChambre;
    private $prixChambre;
    private $idOffre;

    public function __construct($idOffre, $typeChambre, $prixChambre, $idOffre) {
        $this->idOffre = $idOffre;
        $this->typeChambre = $typeChambre;
        $this->prixChambre = $prixChambre;
        $this->idOffre = $idOffre;
    }

    // Getters
    public function getIdOffre() {
        return $this->idOffre;
    }

    public function getTypeChambre() {
        return $this->typeChambre;
    }

    public function getPrixChambre() {
        return $this->prixChambre;
    }

    public function getIdOffre() {
        return $this->idOffre;
    }

    // Setters
    public function setIdOffre($idOffre) {
        $this->idOffre = $idOffre;
    }

    public function setTypeChambre($typeChambre) {
        $this->typeChambre = $typeChambre;
    }

    public function setPrixChambre($prixChambre) {
        $this->prixChambre = $prixChambre;
    }

    public function setIdOffre($idOffre) {
        $this->idOffre = $idOffre;
    }
}
?>
