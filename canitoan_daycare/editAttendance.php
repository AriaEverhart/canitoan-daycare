<?php

  include('session.php'); 
	$date_ID = $_GET['date_ID'];
  $daily_ID = $_POST['daily_ID'];
  $time_In  = date( "H:i", strtotime($_POST['timeIn']));
  $time_Out = $_POST['timeOut'];

  $editAttendance = "UPDATE daily_log
                     SET Time_In = '$time_In',
                         Time_Out = '$time_Out'
                     WHERE ID = $daily_ID";

  $editAttendanceResult = mysqli_query($db, $editAttendance) or die ("Edit Attendance Query Error: '$editAttendance'");

  mysqli_close($db);

  if($editAttendance)
      echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListAttendance.php?id=$date_ID'</script>";
  else
      echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListAttendance.php?id=$date_ID'</script>"; 
?>