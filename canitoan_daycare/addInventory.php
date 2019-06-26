<?php

    include('session.php'); 
	
	$itemName  = $_POST['itemName'];
	$itemQTY  = $_POST['itemQTY'];
	$itemDescription = $_POST['itemDescription'];
	$itemPrice = $_POST['itemPrice'];
	$purchaseDate = $_POST['purchaseDate'];

    $newItem  = "INSERT INTO inventory VALUES ('','$itemName','$itemQTY', '$itemDescription', '$itemPrice', '$purchaseDate')";
    $newItemResult = mysqli_query($db, $newItem) or die ("New Inventory Query Error: '$newItem'");

    mysqli_close($db);

    if($newItem)
        echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListInventory.php'</script>";
    else
        echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListInventory.php'</script>"; 
?>