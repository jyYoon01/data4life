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
        $doctorDAO = new DoctorDAO();
        $appointDAO = new AppointmentDAO();
    ?>
    <form>
    
    <br>
    <h2 class="ml-2">Q3-Q4: Fix/Cancel appointments:</h2><br>
    <p class="ml-2 font-weight-bold">You can manipulate the Table by putting in search keywords</p>
    <label class="ml-2">Search by Patient ID: </label>
    <input type="text" id="input1" onkeyup="filterByPatient()" placeholder="Search for Patient..">&emsp;\
    <label class="ml-2">Search by Doctor ID: </label>
    <input type="text" id="input2" onkeyup="filterByDoctor()" placeholder="Search for Doctor..">&emsp;\
    <label class="ml-2">Search by Date: </label>
    <input type="text" id="input3" onkeyup="filterByDate()" placeholder="Search for YYYY-MM-DD"><br><br>
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
            <th></td>
            <th></td>
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
                echo "<td><button type='button' class='btn btn-danger mx-2' onclick='cancel(this)'>Cancel</button></td>";
                echo "<td><button type='button' class='btn btn-success mx-2' onclick='edit(this)'>Edit</button></td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
    <a href="./index.php" class="ml-2">Back to the Previous Page</a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
        crossorigin="anonymous"></script>
    <script>
        
        function cancel(e){
            var appointmentId = e.parentNode.previousSibling.previousSibling.innerText;
            if(confirm("Are you sure removing this appointment?")){
                window.location.replace("server/helper/cancelAppointment.php?aid="+appointmentId);
            }else{
        
            }
        }

        function edit(e){
            if(confirm("Are you sure editing this engieer?")){
                var appointmentId = e.parentNode.previousSibling.previousSibling.previousSibling.innerText;
                window.location.replace("server/helper/editAppointment.php?aid="+appointmentId);
            }else{
        
            }
        }

        function filterByPatient() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("input1");
            filter = input.value.toUpperCase();
            table = document.getElementById("table1");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

        function filterByDoctor() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("input2");
            filter = input.value.toUpperCase();
            table = document.getElementById("table1");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

        function filterByDate() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("input3");
            filter = input.value.toUpperCase();
            table = document.getElementById("table1");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[7];
                if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
                }
            }
        }

    </script>
</body>
</html>