<?php
// activite.php (Model)

class Activity {
    private $id_act;
    private $nom_activity;
    private $description;
    private $lieu;
    private $date;
    private $duration;
    private $prix;
    private $capacity_max;
    private $image;
    private $type_activity;

    // Constructor
    public function __construct( $id_act,  $nom_activity,  $description, $lieu,  $date, $duration, $prix, $capacity_max, $image, $type_activity) {
        
        $this->id = $id_act;
        $this->nom_activity = $nom_activity;
        $this->description = $description;
        $this->lieu = $lieu;
        $this->date = $date;
        $this->duration = $duration;
        $this->prix = $prix;
        $this->capacity_max = $capacity_max;
        $this->image = $image;
        $this->type_activity = $type_activity;
    }

    // Getters 
    public function getIdActivity() {
        return $this->id_act;
    }

    public function getNomActivity() {
        return $this->nom_activity;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getLieu() {
        return $this->lieu;
    }

    public function getDate() {
        return $this->date;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getCapacityMax() {
        return $this->capacity_max;
    }

    public function getImage() {
        return $this->image;
    }

    public function getTypeActivity() {
        return $this->type_activity;
    }

    // Setters
    public function setIdActivity($id_act) {
        $this->id_act = $id_act;
    }

    public function setNomActivity($nom_activity) {
        $this->nom_activity = $nom_activity;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setLieu($lieu) {
        $this->lieu = $lieu;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setCapacityMax($capacity_max) {
        $this->capacity_max = $capacity_max;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setTypeActivity($type_activity) {
        $this->type_activity = $type_activity;
    }
}