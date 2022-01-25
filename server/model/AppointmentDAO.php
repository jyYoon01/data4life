<?php

// require_once 'common.php';

class AppointmentDAO {

    public function getAll() {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM appointments"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $patients = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $appointments[] =
                new Appointment(
                    $row['DoctorId'],
                    $row['DoctorName'],
                    $row['PatientId'],
                    $row['PatientName'],
                    $row['PatientAge'],
                    $row['PatientGender'],
                    $row['AppointmentId'],
                    $row['AppointmentDate']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $appointments;
    }

    public function getAllbyDoctor($DoctorId) {
         // STEP 1
         $connMgr = new ConnectionManager();
         $conn = $connMgr->connect();
 
         // STEP 2
         $sql = "SELECT
                     *
                 FROM appointments
                 WHERE DoctorId= :DoctorId"; // SELECT * FROM post; // This will also work
         $stmt = $conn->prepare($sql);
         $stmt->bindParam(':DoctorId', $DoctorId, PDO::PARAM_STR);
 
         // STEP 3
         $stmt->execute();
         $stmt->setFetchMode(PDO::FETCH_ASSOC);
 
         // STEP 4
         $appointments = []; // Indexed Array of Post objects
         while( $row = $stmt->fetch() ) {
             $appointments[] =
                 new Appointment(
                     $row['DoctorId'],
                     $row['DoctorName'],
                     $row['PatientId'],
                     $row['PatientName'],
                     $row['PatientAge'],
                     $row['PatientGender'],
                     $row['AppointmentId'],
                     $row['AppointmentDate']);
         }
 
         // STEP 5
         $stmt = null;
         $conn = null;
 
         // STEP 6
         return $appointments;
    }

    public function getAllbyDate($Date) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM appointments
                WHERE DATE(AppointmentDate)= :AppointmentDate"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':AppointmentDate', $Date, PDO::PARAM_STR);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $appointments = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $appointments[] =
                new Appointment(
                    $row['DoctorId'],
                    $row['DoctorName'],
                    $row['PatientId'],
                    $row['PatientName'],
                    $row['PatientAge'],
                    $row['PatientGender'],
                    $row['AppointmentId'],
                    $row['AppointmentDate']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $appointments;
   }

    public function update($DoctorId, $DoctorName, $PatientId, $PatientName, $PatientAge, $PatientGender, $AppointmentId, $AppointmentDate) {

        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "UPDATE
                    appointments
                SET
                    DoctorId = :DoctorId,
                    DoctorName = :DoctorName,
                    PatientId = :PatientId,
                    PatientName = :PatientName,
                    PatientAge = :PatientAge,
                    PatientGender = :PatientGender,
                    AppointmentDate = :AppointmentDate
                WHERE 
                    AppointmentId = :AppointmentId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':DoctorId', $DoctorId, PDO::PARAM_STR);
        $stmt->bindParam(':DoctorName', $DoctorName, PDO::PARAM_STR);
        $stmt->bindParam(':PatientId', $PatientId, PDO::PARAM_STR);
        $stmt->bindParam(':PatientName', $PatientName, PDO::PARAM_STR);
        $stmt->bindParam(':PatientAge', $PatientAge, PDO::PARAM_INT);
        $stmt->bindParam(':PatientGender', $PatientGender, PDO::PARAM_STR);
        $stmt->bindParam(':AppointmentDate', $AppointmentDate, PDO::PARAM_STR);
        $stmt->bindParam(':AppointmentId', $AppointmentId, PDO::PARAM_STR);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function delete($appointmentId) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "DELETE FROM
                    appointments
                WHERE 
                    appointmentId = :appointmentId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':appointmentId', $appointmentId, PDO::PARAM_STR);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function get($aid) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM appointments
                WHERE 
                    AppointmentId = :aid";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':aid', $aid, PDO::PARAM_STR);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $appointment = null;
        if( $row = $stmt->fetch() ) {
            $appointment = 
                new Appointment(
                    $row['DoctorId'],
                    $row['DoctorName'],
                    $row['PatientId'],
                    $row['PatientName'],
                    $row['PatientAge'],
                    $row['PatientGender'],
                    $row['AppointmentId'],
                    $row['AppointmentDate']);
        }
        // STEP 5
        $stmt = null;
        $conn = null;
        // STEP 6
        return $appointment;
    }
}

?>