<?php

class Hotel
{
    private string $nomHotel;
    private string $adresse;
    private string $description;
    private int $etoiles;
    private string $lienPhotoHotel;
    private string $infoContact;

    public function __construct($nomHotel, $adresse, $description, $etoiles, $lienPhotoHotel, $infoContact)
    {
        $this->nomHotel = $nomHotel;
        $this->adresse = $adresse;
        $this->description = $description;
        $this->etoiles = $etoiles;
        $this->lienPhotoHotel = $lienPhotoHotel;
        $this->infoContact = $infoContact;
    }

    public function getNomHotel(): string
    {
        return $this->nomHotel;
    }

    public function setNomHotel(string $nomHotel): void
    {
        $this->nomHotel = $nomHotel;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getEtoiles(): int
    {
        return $this->etoiles;
    }

    public function setEtoiles(int $etoiles): void
    {
        $this->etoiles = $etoiles;
    }

    public function getLienPhotoHotel(): string
    {
        return $this->lienPhotoHotel;
    }

    public function setLienPhotoHotel(string $lienPhotoHotel): void
    {
        $this->lienPhotoHotel = $lienPhotoHotel;
    }

    public function getInfoContact(): string
    {
        return $this->infoContact;
    }

    public function setInfoContact(string $infoContact): void
    {
        $this->infoContact = $infoContact;
    }
}
?>
