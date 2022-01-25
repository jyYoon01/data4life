<?php
    include '../model/common.php';

    $appointDAO = new AppointmentDAO();
    $aid = $_GET['aid'];
    if($appointDAO->delete($aid)){
      echo "Successully Deleted";
      echo "<br>";
      echo "<a href='../../doctorPortal.php'>Go back to previous page</a>";
    }else{
        echo "Failed Action";
        echo "<a href='../../doctorPortal.php'>Go back to previous page</a>";
    }
    
?>