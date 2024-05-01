<?php

class offre {
    private int $idOffre;
    private string $lienOffre1;
    private string $lienOffre2;
    private string $lienOffre3;
    private string $descriptionOffre;
    private DateTime $dateAjoutOffre;
    private string $nomHotel;

    private int $likes;
    private int $dislikes;

    // Constructor
    public function __construct(int $idOffre, string $lienOffre1, string $lienOffre2, string $lienOffre3, string $descriptionOffre, DateTime $dateAjoutOffre, string $nomHotel, int $likes , int $dislikes) {
        $this->idOffre = $idOffre;
        $this->lienOffre1 = $lienOffre1;
        $this->lienOffre2 = $lienOffre2;
        $this->lienOffre3 = $lienOffre3;
        $this->descriptionOffre = $descriptionOffre;
        $this->dateAjoutOffre = $dateAjoutOffre;
        $this->nomHotel = $nomHotel;

        $this->likes = $likes;
        $this->dislikes = $dislikes;
    }

    // Getters
    public function getIdOffre(): int {
        return $this->idOffre;
    }

    public function getLienOffre1(): string {
        return $this->lienOffre1;
    }

    public function getLienOffre2(): string {
        return $this->lienOffre2;
    }

    public function getLienOffre3(): string {
        return $this->lienOffre3;
    }

    public function getDescriptionOffre(): string {
        return $this->descriptionOffre;
    }

    public function getDateAjoutOffre(): DateTime {
        return $this->dateAjoutOffre;
    }

    public function getNomHotel(): string {
        return $this->nomHotel;
    }

    public function getLikes(): int {
        return $this->likes;
    }

    public function getDisikes(): int {
        return $this->dislikes;
    }



    // Setters
    public function setLienOffre1(string $lienOffre1): void {
        $this->lienOffre1 = $lienOffre1;
    }

    public function setLienOffre2(string $lienOffre2): void {
        $this->lienOffre2 = $lienOffre2;
    }

    public function setLienOffre3(string $lienOffre3): void {
        $this->lienOffre3 = $lienOffre3;
    }

    public function setDescriptionOffre(string $descriptionOffre): void {
        $this->descriptionOffre = $descriptionOffre;
    }

    public function setDateAjoutOffre(DateTime $dateAjoutOffre): void {
        $this->dateAjoutOffre = $dateAjoutOffre;
    }

    public function setNomHotel(string $nomHotel): void {
        $this->nomHotel = $nomHotel;
    }

    public function setLikes(int $likes): void {
        $this->likes = $likes;
    }
    public function setDisikes(int $dislikes): void {
        $this->dislikes = $dislikes;
    }
}

?>
