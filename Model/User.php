<?php
    class User{
        private string $Cin_User;
        private string $Nom_User;
        private string $Prenom_User;
        private string $D_N_User;
        private string $Email_User;
        private string $Phone_User;
        private string $Pwd_User;
        private string $Image_User;
        function __construct($Cin_User,$Nom_User,$Prenom_User,$D_N_User,$Email_User,$Phone_User,$Pwd_User){
            $this->Cin_User = $Cin_User;
            $this->Nom_User = $Nom_User;
            $this->Prenom_User = $Prenom_User;
            $this->D_N_User = $D_N_User;
            $this->Email_User = $Email_User;
            $this->Phone_User = $Phone_User;
            $this->Pwd_User = $Pwd_User;
        }
        public function getCin_User(){
            return $this->Cin_User;
        }
        function getNom_User(){
            return $this->Nom_User;
        }
        function getPrenom_User(){
            return $this->Prenom_User;
        }
        function getD_N_User(){
            return $this->D_N_User;
        }
        function getEmail_User(){
            return $this->Email_User;
        }
        function getPhone_User(){
            return $this->Phone_User;
        }
        function getPwd_User(){
            return $this->Pwd_User;
        }
        function setCin_User($Cin_User)
        {
		    $this->Cin_User=$Cin_User;
        }
         function setNom_User($Nom_User)
        {
		    $this->Nom_User=$Nom_User;
        }
        function setPrenom_User($Prenom_User)
        {
		    $this->Prenom_User=$Prenom_User;
        }
        function setD_N_User($D_N_User)
        {
		    $this->D_N_User=$D_N_User;
        }
        function setEmail_User($Email_User)
        {
		    $this->Email_User=$Email_User;
        }
        function setPhone_User($Phone_User)
        {
		    $this->Phone_User=$Phone_User;
        }
        function setPwd_User($Pwd_User)
        {
		    $this->Pwd_User=$Pwd_User;
        }
    }
?>