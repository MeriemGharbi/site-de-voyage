<?php
    class Partnership{
        private string $Agency_ID;
        private string $Agency_Name;
        private string $address;
        private string $Agency_Email;
        private string $Agency_phone;
        private string $Partnership_Start_Date;
        private string $Partnership_End_Date;
        private string $Partnership_Status;
        private string $Type_Vehicles_Available;
        function __construct($Agency_ID,$Agency_Name,$address,$Agency_Email,$Agency_phone,$Partnership_Start_Date,$Partnership_End_Date,$Partnership_Status,$Type_Vehicles_Available){
            $this->Agency_ID = $Agency_ID;
            $this->Agency_Name = $Agency_Name;
            $this->address = $address;
            $this->Agency_Email = $Agency_Email;
            $this->Agency_phone = $Agency_phone;
            $this->Partnership_Start_Date = $Partnership_Start_Date;
            $this->Partnership_End_Date = $Partnership_End_Date;
            $this->Type_Vehicles_Available = $Type_Vehicles_Available;
            $this->Partnership_Status = $Partnership_Status;
        }
        public function getAgency_ID(){
            return $this->Agency_ID;
        }
        function getAgency_Name(){
            return $this->Agency_Name;
        }
        function getaddress(){
            return $this->address;
        }
        function getAgency_Email(){
            return $this->Agency_Email;
        }
        function getAgency_phone(){
            return $this->Agency_phone;
        }
        function getPartnership_Start_Date(){
            return $this->Partnership_Start_Date;
        }
        function getPartnership_End_Date(){
            return $this->Partnership_End_Date;
        }
        function getType_Vehicles_Available(){
            return $this->Type_Vehicles_Available;
        }
        function getPartnership_Status(){
            return $this->Partnership_Status;
        }
        function setAgency_ID(){
            return $this->Agency_ID;
        }
        function setAgency_Name($Agency_Name)
        {
		    $this->Agency_Name=$Agency_Name;
        }
         function setaddress($address)
        {
		    $this->address=$address;
        }
        function setPartnership_Start_Date($Partnership_Start_Date)
        {
		    $this->Partnership_Start_Date=$Partnership_Start_Date;
        }
        function setPartnership_End_Date($Partnership_End_Date)
        {
		    $this->Partnership_End_Date=$Partnership_End_Date;
        }
        function setAgency_Email($Agency_Email)
        {
		    $this->Agency_Email=$Agency_Email;
        }
        function setAgency_phone($Agency_phone)
        {
		    $this->Agency_phone=$Agency_phone;
        }
        function setPartnership_Status($Partnership_Status)
        {
		    $this->Partnership_Status=$Partnership_Status;
        }
        function setType_Vehicles_Available($Type_Vehicles_Available)
        {
		    $this->Type_Vehicles_Available=$Type_Vehicles_Available;
        }
    }
?>