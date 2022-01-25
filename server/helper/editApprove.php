<?php
    include '../model/common.php';
    $AppointmentId = $_GET['aid'];
    $DoctorId = $_GET['DoctorId'];
    $DoctorName = $_GET['DoctorName'];
    $PatientId = $_GET['PatientId'];
    $PatientName = $_GET['PatientName'];
    $PatientAge = $_GET['PatientAge'];
    $PatientGender = $_GET['PatientGender'];
    $date = $_GET['date'];
    $newDate = str_replace("T"," ",$date);

    $appointmentDAO = new AppointmentDAO();
    
    
    //Only if both conditions are true
    if(checkAppointmentCond1($newDate, $AppointmentId)&&checkAppointmentCond2($newDate)){
      $appointmentDAO->update($DoctorId, $DoctorName, $PatientId, $PatientName, $PatientAge, $PatientGender, $AppointmentId, $newDate);
      echo "Successully Updated";
      echo "<br>";
      echo "<br>";
      echo "<a href='../../doctorPortal.php'>Go back to previous page</a>";
    }else{
      echo "Action failed";
      echo "<br>";
      echo "<a href='../../doctorPortal.php'>Go back to previous page</a>";
    }
    
    function checkAppointmentCond1($newDate, $AppointmentId) {
      //Check whether the new date and time is booked already
        $appointmentDAO = new AppointmentDAO();
        $appointments = $appointmentDAO->getAll();
        //Appointments array should exclude the one that we are editing
        $index=null;
        for($x = 0; $x < sizeof($appointments); $x++){
          if($appointments[$x]->getId()==$AppointmentId){
            $index = $x;
          }
        }
        array_splice($appointments, $index, 1); 
        $datesArray = array();
        $status = true;
        foreach($appointments as $appointment){
          array_push($datesArray,$appointment->getDate());
        }
        foreach($datesArray as $dateEle){
          $to_time = strtotime($dateEle);
          $from_time = strtotime($newDate);
          if(round(abs($to_time - $from_time) / 60,2)<60){
            $status = false;
          }
        }
        return $status;
    }

    function checkAppointmentCond2($newDate){
      //Check whether the new time is between 8am and 4pm
      $time = strtotime($newDate);
      if(date('H', $time)>=8 &&date('H', $time)<16){
        return true;
      }else{
        return false;
      }
    }




    
   
?>

