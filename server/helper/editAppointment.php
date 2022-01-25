<?php
    include '../model/common.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Edit Appointment</title>
</head>
<body>
  <!-- add or modify code as necessary -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark nav fixed-top">
        <a href="./index.php" class="navbar-brand"><img src="" style="width: 100px; height: auto;">Data4Life</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hamburger">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="hamburger">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a href="home.html" class="nav-link">Home</a>
                    
                </li> -->
             
               
                
                <li class="nav-item">
                  <a href= "./index.php"  class="nav-link">Doctor Portal</a>
                </li>
                
                <li class="nav-item">
                  <!-- LinkedIn Hidden Inputs -->
                  <form method='get' action='https://www.linkedin.com/oauth/v2/authorization' class="form-inline">
                    
                    <button href="#" type='submit' class="nav-link" style="background-color: transparent; border: none; text-transform: uppercase; letter-spacing: .1rem;">Logged In</button>
                  </form>  
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <br>

  <?php
      $appointDAO = new AppointmentDAO();
      $appointmentId = $_GET['aid'];
      $appointment_obj = $appointDAO->get($appointmentId);
  ?>                 
  <h1 class="ml-2">Edit Appointment Information</h1><br>
  <h4 class="ml-2">Details of Appointment(<strong>AppointmentID = <?php echo $appointmentId; ?></strong>) are as follows:</h3>
  <form method="get" action="editApprove.php" class="m-2 w-50">
  <input type="hidden" name="aid" value="<?php echo $appointmentId; ?>" />
  <div class="form-group">
      <label for="DoctorID">Doctor ID</label>
      <input type="text" id="DoctorId" name="DoctorId" class="form-control" value="<?php echo $appointment_obj->getDoctorId() ?>">
    </div>
    <div class="form-group">
      <label for="DoctorName">Doctor Name</label>
      <input type="text" id="DoctorName" name="DoctorName" class="form-control" value="<?php echo $appointment_obj->getDoctorName() ?>">
    </div>
    <div class="form-group">
      <label for="PatientId">Patient ID</label>
      <input type="text" id="PatientId" name="PatientId" class="form-control" value="<?php echo $appointment_obj->getPatientId() ?>">
    </div>
    <div class="form-group">
      <label for="PatientName">Patient Name</label>
      <input type="text" id="PatientName" name="PatientName" class="form-control" value="<?php echo $appointment_obj->getPatientName() ?>">
    </div>
    <div class="form-group">
      <label for="PatientAge">Patient Age</label>
      <input type="text" id="PatientAge" name="PatientAge" class="form-control" value="<?php echo $appointment_obj->getPatientAge() ?>">
    </div>
    <div class="form-group">
      <label for="PatientGender">Patient Gender</label><br>
      <select id="PatientGender" name="PatientGender">
      <?php
        if($appointment_obj->getPatientGender()=='M'){
          echo "<option value='M' selected>Male</option>";
          echo "<option value='F'>Female</option>";
        }else{
          echo "<option value='M'>Male</option>";
          echo "<option value='F' selected>Female</option>";
        }
      ?>
      </select>
    </div><div class="form-group">
      <?php
        $dateTime = $appointment_obj->getDate();
        $dateTime = strtotime($dateTime);
        $newDate = date('Y-m-d\TH:i', $dateTime);
      ?>
      <label for="AppointmentDate">Appointment Date</label>
      <input type="datetime-local" class="form-control" name="date" 
        value="<?php echo $newDate; ?>">
    </div>
    <input type="submit" class=" btn btn-warning" value="Edit">
  </form>
     

   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>