<?php

class Appointment
{
    private $DoctorId;
    private $DoctorName;
    private $PatientId;
    private $PatientName;
    private $PatientAge;
    private $PatientGender;
    private $AppointmentId;
    private $AppointmentDate;
    
    public function __construct($DoctorId, $DoctorName, $PatientId, $PatientName, $PatientAge, $PatientGender, $AppointmentId, $AppointmentDate) {
        $this->DoctorId = $DoctorId;
        $this->DoctorName = $DoctorName;
        $this->PatientId = $PatientId;
        $this->PatientName = $PatientName;
        $this->PatientAge = $PatientAge;
        $this->PatientGender = $PatientGender;
        $this->AppointmentId = $AppointmentId;
        $this->AppointmentDate = $AppointmentDate;
    }

    // GET METHODS
    public function getId()
    {
        return $this->AppointmentId;
    }

    public function getDate()
    {
        return $this->AppointmentDate;
    }

    public function getDoctorId()
    {
        return $this->DoctorId;
    }

    public function getDoctorName()
    {
        return $this->DoctorName;
    }

    public function getPatientId()
    {
        return $this->PatientId;
    }

    public function getPatientName()
    {
        return $this->PatientName;
    }

    public function getPatientAge()
    {
        return $this->PatientAge;
    }

    public function getPatientGender()
    {
        return $this->PatientGender;
    }

    // SET METHODS

    public function setDate()
    {
        return $this->AppointmentDate;
    }

    public function setDoctorId()
    {
        return $this->DoctorId;
    }

    public function setDoctorName()
    {
        return $this->DoctorName;
    }

    public function setPatientId()
    {
        return $this->PatientId;
    }

    public function setPatientName()
    {
        return $this->PatientName;
    }

    public function setPatientAge()
    {
        return $this->PatientAge;
    }

    public function setPatientGender()
    {
        return $this->PatientGender;
    }

}

?>