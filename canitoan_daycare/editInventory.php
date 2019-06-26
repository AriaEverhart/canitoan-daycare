<?php
  include('session.php'); 

	$item_ID          = $_POST['item_ID'];
  $item_Name        = $_POST['itemName'];
  $item_QTY         = $_POST['itemQTY'];
  $item_Description = $_POST['itemDescription'];
  $item_Price       = $_POST['itemPrice'];
  $purchase_Date    = $_POST['purchaseDate'];


  $editInventory = "UPDATE inventory
                     SET item_name        = '$item_Name',
                         item_QTY         = '$item_QTY',
                         item_Description = '$item_Description',
                         price            = '$item_Price',
                         date_of_purchase = '$purchase_Date'
                     WHERE item_ID = $item_ID";

  $editInventoryResult = mysqli_query($db, $editInventory) or die ("Edit Inventory Query Error: '$editInventory'");

  mysqli_close($db);

  if($editInventory)
      echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListInventory.php'</script>";
  else
      echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListInventory.php'</script>"; 
?>