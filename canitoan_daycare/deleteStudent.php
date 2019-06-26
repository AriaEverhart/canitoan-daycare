<?php 

include('session.php'); 

$id = $_GET['id'];

$deleteFromParent = "DELETE FROM parent WHERE student_id = $id";
$deleteFromParentResult = mysqli_query($db, $deleteFromParent);
$deleteFromStudent = "DELETE FROM student_profile WHERE student_id = $id";
$deleteFromStudentResult = mysqli_query($db, $deleteFromStudent);

mysqli_close($db);
if ($deleteFromStudentResult) {
    echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListStudents.php'</script>";
    exit;
} else {
    echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListStudents.php'</script>";
}