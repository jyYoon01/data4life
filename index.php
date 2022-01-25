<?php
    require_once('server/model/common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
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
                  <a href= "./doctorPortal.php"  class="nav-link">Doctor Portal</a>
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
    <br><br><br><br>
    <h2 class="ml-2">Q2: Get all appointments by doctor and date:</h2><br>
    <p class="ml-2">You can retrieve the <strong>Appointment Information</strong> by putting in some keywords</p>
    <?php
        $doctorDAO = new DoctorDAO();
        $appointDAO = new AppointmentDAO();
    ?>
    <form>
    <label for="date" class="ml-2">Doctor:</label>
    <select id="doctorName">
        <option value="">Select a person:</option>
        <?php
            foreach($doctorDAO->getAll() as $doctor){
                echo "<option value='".$doctor->getId()."'>".$doctor->getName()."</option>";
            }
        ?>
    </select>
    <label for="date">Date:</label>
    <input type="date" id="appointmentDate"  min="2018-03-01" max="2018-04-30">   
    <button id="q2submit">Search</button>
    </form>
    <div id="container">
        <?php
            echo "<table class='table table-striped' id='table1'>
            <tr>
            <th>DoctorId</th>
            <th>DoctorName</th>
            <th>PatientId</th>
            <th>PatientName</th>
            <th>PatieintAge</th>
            <th>PatieintGender</th>
            <th>AppointmentId</th>
            <th>AppointmentDate</th>
            </tr>";
            foreach($appointDAO->getAll() as $appoint){
                echo "<tr>";
                echo "<td>" . $appoint->getDoctorId() . "</td>";
                echo "<td>" . $appoint->getDoctorName() . "</td>";
                echo "<td>" . $appoint->getPatientId() . "</td>";
                echo "<td>" . $appoint->getPatientName() . "</td>";
                echo "<td>" . $appoint->getPatientAge() . "</td>";
                echo "<td>" . $appoint->getPatientGender() . "</td>";
                echo "<td>" . $appoint->getId(). "</td>";
                echo "<td>" . $appoint->getDate() . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
    <div id="q2-result"></div>
    <a href="./doctorPortal.php" class="ml-2">Go to the Next Page</a>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous"></script>
    <script>
        function showResult(doctor, date){
            document.getElementById("container").style.display = "none";
            if (doctor == "" && date=="") {
                document.getElementById("q2-result").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("q2-result").innerHTML = this.responseText;
                }
                };
                xmlhttp.open("GET","server/helper/getAppointments.php?doctor="+doctor+"&date="+date,true);
                xmlhttp.send();
            }
        }

        function cancel(e){
            var appointmentId = e.parentNode.previousSibling.previousSibling.innerText;
            if(confirm("Are you sure removing this appointment?")){
                window.location.replace("/data4life/cancelAppointment.php?aid="+appointmentId);
            }else{
        
            }
        }

        function edit(e){
            if(confirm("Are you sure editing this engieer?")){
                var appointmentId = e.parentNode.previousSibling.previousSibling.previousSibling.innerText;
                window.location.replace("/data4life/editAppointment.php?aid="+appointmentId);
            }else{
        
            }
        }


        document.getElementById("q2submit").addEventListener("click", function () {
            var doctorName = document.getElementById("doctorName").value;
            var appointmentDate = document.getElementById("appointmentDate").value;
            event.preventDefault()
            showResult(doctorName, appointmentDate);
        });
    </script>
</body>
</html>