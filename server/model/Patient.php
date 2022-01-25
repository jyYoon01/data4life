<?php

class Patient
{
    private $PatientId;
    private $PatientName;
    private $PatientAge;
    private $PatientGender;

    public function __construct($PatientId, $PatientName, $PatientAge, $PatientGender) {
        $this->PatientId = $PatientId;
        $this->PatientName = $PatientName;
        $this->PatientAge = $PatientAge;
        $this->PatientGender = $PatientGender;
    }

    // GET METHODS
    public function getId()
    {
        return $this->PatientId;
    }

    public function getName()
    {
        return $this->PatientName;
    }

    public function getAge()
    {
        return $this->PatientAge;
    }

    public function getGender()
    {
        return $this->PatientGender;
    }

    
    // SET METHODS
    public function setId(string $PatientId)
    {
        $this->PatientId = $PatientId;
    }

    public function setName(string $PatientName)
    {
        $this->PatientName = $PatientName;
    }

    public function setAge($PatientAge)
    {
        $this->PatientAge = $PatientAge;
    }

    public function setGender($PatientGender)
    {
        $this->PatientGender = $PatientGender;
    }

}

?>