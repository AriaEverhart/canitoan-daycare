<?php 

include('session.php'); 

$id = $_GET['id'];

$deleteFromInventory = "DELETE FROM inventory WHERE item_ID = $id";
$deleteFromInventoryResult = mysqli_query($db, $deleteFromInventory);

mysqli_close($db);
if ($deleteFromInventoryResult) {
    echo "<script type='text/javascript'>alert('Success!'); window.location.href = 'ListInventory.php'</script>";
    exit;
} else {
    echo "<script type='text/javascript'>alert('Failed!'); window.location.href = 'ListInventory.php'</script>";
}