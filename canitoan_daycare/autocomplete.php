<?php

include('session.php'); 

// Get search term
$searchTerm = $_GET['term'];

// Get matched data from skills table
$query = $db->query("SELECT student_ID, name FROM student_profile WHERE name LIKE '%".$searchTerm."%' ORDER BY name ASC");

// Generate skills data array
$nameData = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data['id'] = $row['student_ID'];
        $data['value'] = $row['name'];
        array_push($nameData, $data);
    }
}

// Return results as json encoded array
echo json_encode($nameData);
?>