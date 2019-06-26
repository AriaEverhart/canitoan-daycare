<?php

    include('session.php'); 
	
	$studentName  = $_POST['studentName'];
	$studentSex  = $_POST['studentSex'];
	$studentDOB = $_POST['studentDOB'];
	$address = $_POST['address'];
	$parentName = $_POST['parentName'];
	$parentNum = $_POST['parentNum'];
	if(isset($_POST['PWD'])) { $PWD = "Yes"; } else { $PWD = "No";}

    $newStudent  = "INSERT INTO student_profile VALUES ('','$studentName','$studentSex', '$PWD', '$studentDOB', \"$address\")";
    $newStudentResult = mysqli_query($db, $newStudent) or die ("New Student Query Error: '$newStudent'");

    $studentID = mysqli_insert_id($db);

    $newParent = "INSERT INTO parent VALUES ('', '$studentID', '$parentName', '$parentNum')";
    $newParentResult = mysqli_query($db, $newParent) or die ("New Parent Query Error: '$newParent'");

    mysqli_close($db);

    if($newParent)
        echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListStudents.php'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListStudents.php'</script>"; 
?>