<?php
	include('session.php'); 
	
	$student_ID = $_POST['student_ID'];
	$date_ID = $_GET['date_ID'];
	$Time_In = $_POST['currentTimeIn'];


	$newAttendance  = "INSERT INTO daily_log VALUES ('','$student_ID', '$date_ID', '$Time_In', '')";
	$newAttendanceResult = mysqli_query($db, $newAttendance) or die ("New Attendance Query Error: '$newAttendance'");

	mysqli_close($db);

	if($newAttendance)
        echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListAttendance.php?id=$date_ID'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListAttendance.php?id=$date_ID'</script>"; 
?>