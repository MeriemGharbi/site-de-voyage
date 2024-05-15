<?php
// voiture.php (Model)

class Voiture {
    private $id_voiture;
    private $marque;
    private $modele;
    private $annee;
    private $couleur;
    private $type;
    private $prix_journee;
    private $disponibilite;
    private $image;

    // Constructor
    public function __construct($id_voiture, $marque, $modele, $annee, $couleur, $type, $prix_journee, $disponibilite, $image) {
        $this->id_voiture = $id_voiture;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->couleur = $couleur;
        $this->type = $type;
        $this->prix_journee = $prix_journee;
        $this->disponibilite = $disponibilite;
        $this->image = $image;
    }

    // Getters 
    public function getIdVoiture() {
        return $this->id_voiture;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function getType() {
        return $this->type;
    }

    public function getPrixJournee() {
        return $this->prix_journee;
    }

    public function getDisponibilite() {
        return $this->disponibilite;
    }

    public function getImage() {
        return $this->image;
    }

    // Setters
    public function setIdVoiture($id_voiture) {
        $this->id_voiture = $id_voiture;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function setAnnee($annee) {
        $this->annee = $annee;
    }

    public function setCouleur($couleur) {
        $this->couleur = $couleur;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setPrixJournee($prix_journee) {
        $this->prix_journee = $prix_journee;
    }

    public function setDisponibilite($disponibilite) {
        $this->disponibilite = $disponibilite;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}
