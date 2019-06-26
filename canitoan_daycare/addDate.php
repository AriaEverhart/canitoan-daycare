<?php
    include('session.php'); 
	
	$date  = $_POST['date'];

    $newDate  = "INSERT INTO date_list VALUES ('','$date')";
    $newDateResult = mysqli_query($db, $newDate) or die ("New Date Query Error: '$newDate'");

    mysqli_close($db);

    if($newDate)
        echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListDates.php'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListDates.php'</script>"; 
?>