<?php
// Include the database connection file
include('db_config.php');
 
if (isset($_POST['regionId']) && !empty($_POST['regionId'])) {
 
 // Fetch state name base on country id
 $query = "SELECT * FROM municipalities WHERE region_id = ".$_POST['regionId'];
 $result = $con->query($query);
 
 if ($result->num_rows > 0) {
 echo '<option value="">Select Municipality</option>';
 while ($row = $result->fetch_assoc()) {
 echo '<option value="'.$row['id'].'">'.$row['mun_name'].'</option>';
 }
 } else {
 echo '<option value="">Municipality not available</option>';
 }
} elseif(isset($_POST['munId']) && !empty($_POST['munId'])) {
 
 // Fetch city name base on state id
 $query = "SELECT * FROM barangays WHERE mun_id = ".$_POST['munId'];
 $result = $con->query($query);
 
 if ($result->num_rows > 0) {
 echo '<option value="">Select Barangay</option>';
 while ($row = $result->fetch_assoc()) {
 echo '<option value="'.$row['id'].'">'.$row['brgy_name'].'</option>';
 }
 } else {
 echo '<option value="">Barangay not available</option>';
 }
}
?>