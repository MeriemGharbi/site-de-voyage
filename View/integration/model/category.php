class Category {
    private $id_category;
    private $nom_category;
    private $level;
    private $season;
    private $popularity;
    private $mobility;
   
    // Constructor
    public function __construct($id_category, $nom_category, $level, $season, $popularity, $mobility) {
        $this->id_category = $id_category;
        $this->nom_category = $nom_category;
        $this->level = $level;
        $this->season = $season;
        $this->popularity = $popularity;
        $this->mobility = $mobility;
    }

    // Getters 
    public function getIdCategory() {
        return $this->id_category;
    }

    public function getNomCategory() {
        return $this->nom_category;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getSeason() {
        return $this->season;
    }

    public function getPopularity() {
        return $this->popularity;
    }

    public function getMobility() {
        return $this->mobility;
    }

    // Setters
    public function setIdCategory($id_category) {
        $this->id_category = $id_category;
    }

    public function setNomCategory($nom_category) {
        $this->nom_category = $nom_category;
    }

    public function setLevel($level) {
        $this->level = $level;
    }

    public function setSeason($season) {
        $this->season = $season;
    }

    public function setPopularity($popularity) {
        $this->popularity = $popularity;
    }

    public function setMobility($mobility) {
        $this->mobility = $mobility;
    }
}
