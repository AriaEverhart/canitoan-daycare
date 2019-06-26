<?php

    include('session.php'); 
	
    $student_ID = $_POST['student_ID'];
	$studentName  = $_POST['studentName'];
	$studentSex  = $_POST['studentSex'];
	$studentDOB = $_POST['studentDOB'];
	$address = $_POST['address'];
	$parentName = $_POST['parentName'];
	$parentNum = $_POST['parentNum'];

	if(isset($_POST['PWD'])) { $PWD = "Yes"; } else { $PWD = "No";}

    $editStudent = "UPDATE student_profile
                    SET name          = '$studentName',
                        sex           = '$studentSex',
                        PWD           = '$PWD',
                        date_of_birth = '$studentDOB',
                        address       = \"$address\"
                    WHERE student_ID  = $student_ID";

    $editStudentResult = mysqli_query($db, $editStudent) or die ("Edit Student Query Error: '$newStudent'");

    $editParent = "UPDATE parent
                   SET name           = '$parentName',
                       contact_number = '$parentNum'
                   WHERE student_ID   = $student_ID";
    $editParentResult = mysqli_query($db, $editParent) or die ("Edit Parent Query Error: '$newStudent'");

    mysqli_close($db);

    if($editParent)
        echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListStudents.php'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListStudents.php'</script>"; 
?>