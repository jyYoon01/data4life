<?php

class Doctor
{
    private $DoctorId;
    private $DoctorName;
    
    public function __construct($DoctorId, $DoctorName) {
        $this->DoctorId = $DoctorId;
        $this->DoctorName = $DoctorName;
    }

    // GET METHODS
    public function getId()
    {
        return $this->DoctorId;
    }

    public function getName()
    {
        return $this->DoctorName;
    }


    // SET METHODS
    public function setId(string $DoctorId)
    {
        $this->DoctorId = $DoctorId;
    }

    public function setName(string $DoctorName)
    {
        $this->DoctorName = $DoctorName;
    }

    
}

?>