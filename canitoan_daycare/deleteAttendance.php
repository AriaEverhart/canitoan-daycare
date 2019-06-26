<?php 

include('session.php'); 

$log_id = $_GET['log_id'];
$date_id = $_GET['date_id'];

$deleteFromAttendance = "DELETE FROM daily_log WHERE ID = $log_id";
$deleteFromAttendanceResult = mysqli_query($db, $deleteFromAttendance);

mysqli_close($db);
if ($deleteFromAttendance) {
    echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListAttendance.php?id=$date_id'</script>";
    exit;
} else {
    echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListAttendance.php?id=$date_id'</script>";
}