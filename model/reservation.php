<?php
// reservation.php (Model)

class Reservation {
    private $id_reservation;
    private $nom_client;
    private $id_voiture;
    private $date_debut;
    private $date_fin;
    private $prix_total;
    private $statut;

    // Constructor
    public function __construct($id_reservation, $nom_client, $id_voiture, $date_debut, $date_fin, $prix_total, $statut) {
        $this->id_reservation = $id_reservation;
        $this->nom_client = $nom_client;
        $this->id_voiture = $id_voiture;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->prix_total = $prix_total;
        $this->statut = $statut;
    }

    // Getters 
    public function getIdReservation() {
        return $this->id_reservation;
    }

    public function getNomClient() {
        return $this->nom_client;
    }

    public function getIdVoiture() {
        return $this->id_voiture;
    }

    public function getDateDebut() {
        return $this->date_debut;
    }

    public function getDateFin() {
        return $this->date_fin;
    }

    public function getPrixTotal() {
        return $this->prix_total;
    }

    public function getStatut() {
        return $this->statut;
    }

    // Setters
    public function setIdReservation($id_reservation) {
        $this->id_reservation = $id_reservation;
    }

    public function setnomClient($nom_client) {
        $this->nom_client = $nom_client;
    }

    public function setIdVoiture($id_voiture) {
        $this->id_voiture = $id_voiture;
    }

    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }

    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }

    public function setPrixTotal($prix_total) {
        $this->prix_total = $prix_total;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
    }
}
