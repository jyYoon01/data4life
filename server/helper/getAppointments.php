<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php
require_once '../model/common.php';
$doctor = $_GET['doctor'];
$date = $_GET['date'];

$connMgr = new ConnectionManager();
$conn = $connMgr->connect();

$sql="SELECT * FROM appointments WHERE DoctorId = '".$doctor."'"."AND date(AppointmentDate) = '".$date."'";
$stmt = $conn->prepare($sql);

        // STEP 3
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

echo "<table class='table table-striped'>
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
while($row = $stmt->fetch()) {
  echo "<tr>";
  echo "<td>" . $row['DoctorId'] . "</td>";
  echo "<td>" . $row['DoctorName'] . "</td>";
  echo "<td>" . $row['PatientId'] . "</td>";
  echo "<td>" . $row['PatientName'] . "</td>";
  echo "<td>" . $row['PatientAge'] . "</td>";
  echo "<td>" . $row['PatientGender'] . "</td>";
  echo "<td>" . $row['AppointmentId'] . "</td>";
  echo "<td>" . $row['AppointmentDate'] . "</td>";
  echo "</tr>";
}
echo "</table>";

?>
</body>
</html>