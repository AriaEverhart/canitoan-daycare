<?php 

include('session.php'); 

$id = $_GET['id'];

$deleteFromAttendance = "DELETE FROM daily_log WHERE date_id = $id";
$deleteFromAttendanceResult = mysqli_query($db, $deleteFromAttendance);
$deleteFromDates = "DELETE FROM date_list WHERE date_id = $id";
$deleteFromDatesResult = mysqli_query($db, $deleteFromDates);

mysqli_close($db);
if ($deleteFromDatesResult) {
    echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListDates.php'</script>";
    exit;
} else {
    echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListDates.php'</script>";
}