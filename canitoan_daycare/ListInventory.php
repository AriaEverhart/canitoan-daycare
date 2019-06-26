<?php include('session.php'); ?>

<html>
	<head>
		<title>List Inventory</title>
		
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>

	<body>
		<!--- Navigation Bar --->
		<div id="navbar"></div>
	    <script>
	    	$("#navbar").load("navbar.php");
	    </script>
	    <!--- End of Navigation Bar --->
	    <div class="container">
			<!--- Page Info and Search Bar --->
	        <div class="table-wrapper">
	            <div class="table-title">
	                <div class="row">
	                    <div class="col-sm-9"><h2>Inventory</h2></div>
	                </div>
	            </div>

				<!--- Table --->
	            <table class="table table-striped table-hover table-bordered">
	            	<!--- Table Header --->
	                <thead>
	                    <tr>	 
	                        <th> ID       	 	  </th>
	                        <th> Name             <span class="glyphicon glyphicon-sort" style="font-size: 13px"></span></th>
	                        <th> Qty	     	  </th>
	                        <th> Description 	  </th>
	                        <th> Price 			  </th>
	                        <th> Date of Purchase </th>
	                        <th> Actions	 	  </th>
	                    </tr>
	                </thead>
	                <!--- Table Content --->
	                <?php
	                	$query = 'SELECT item_ID,
	                					 item_name,
	                					 item_QTY,
	                					 item_description,
	                					 price,
	                					 date_of_purchase
                                         FROM inventory';
                        $result = mysqli_query($db, $query)
                        or die ('query error');

                        if(!$query)
                            ('Error in query: ' . mysqli_error($query));

                        if(mysqli_num_rows ($result)>0){
                            while($row = mysqli_fetch_row($result)){
                                echo"<tbody><tr>
	                                    <td>$row[0]</td>
	                                    <td>$row[1]</td> 
	                                    <td>$row[2]</td> 
	                                    <td>$row[3]</td>
										<td>$row[4]</td>
										<td>$row[5]</td>";
					?>

	                        <!--- Actions Column --->
		                    <td align="center">	
								<a href="#" title="Edit" type="Submit" name = "ID" 
								   value="<?php echo"$row[0]";?>" data-toggle="modal" data-target="#editInventory-<?php echo $row[0];?>">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
		                        <a href='deleteInventory.php?id="<?php echo"$row[0]";?>"' title="Delete" data-toggle="tooltip" onClick="return confirm('Delete This Entry	?')">
		                        	<span class="glyphicon glyphicon-trash"></span>
		                        </a>
		                    </td>

		                    <script>
								$(document).ready(function(){
								  $('[data-toggle="tooltip"]').tooltip(); 
								});
							</script>
					<?php 	
							}
						} 
					?>
		                    <!--- End of Actions Column --->
	                    </tr>      
	                </tbody>
	            </table>
	            <!--- End of Table --->

	            <!--- Pagination --->
	            <div align="right">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
					    </li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</div>
	        </div>
	        <!-- Add Inventory Button Trigger -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addInventory">
			  Add Item
			</button>

			<!-- Add Inventory Popup -->
			<div class="modal fade" id="addInventory" tabindex="-1" role="dialog" aria-labelledby="addInventoryLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h5 class="modal-title" id="addInventoryLabel">Add Item</h5>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="addInventory.php" method="post">
								<div class="form-group">
									<label class="control-label col-sm-4" for="itemName"> Name: </label>
									<div class="col-sm-6"><input type="text" class="form-control" name="itemName" value="<?php echo $row[1]; ?>"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="itemQTY"> Quantity: </label>
									<div class="col-sm-6"><input type="text" class="form-control" name="itemQTY"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="itemDescription"> Description: </label>
									<div class="col-sm-6"><textarea class="form-control" name="itemDescription" rows="5"></textarea></div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="itemPrice"> Price: </label>
									<div class="col-sm-6"><input type="text" class="form-control" name="itemPrice"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="purchaseDate"> Date of Purchase: </label>
									<div class="col-sm-6"><input type="date" class="form-control" name="purchaseDate"></div>
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="Submit" class="btn btn-primary" value="Submit">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Add Inventory Popup -->


			<!-- Edit Inventory Popup -->
			<?php
	            $query = 'SELECT item_ID,
            					 item_name,
            					 item_QTY,
            					 item_description,
            					 price,
            					 date_of_purchase
                                 FROM inventory';
                $result = mysqli_query($db, $query)
                or die ('query error');

                if(!$query)
                    ('Error in query: ' . mysqli_error($query));

                if(mysqli_num_rows ($result)>0){
                    while($row = mysqli_fetch_row($result)){
				?>
			<div class="modal fade" id="editInventory-<?php echo $row[0];?>" tabindex="-1" role="dialog" aria-labelledby="editInventoryLabel-<?php echo $row[0];?>" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h5 class="modal-title" id="editInventoryLabel-<?php echo $row[0];?>">Edit Item</h5>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="editInventory.php" method="post">
								<input type="hidden" name="item_ID" value="<?php echo $row[0];?>">
								<div class="form-group">
									<label class="control-label col-sm-4" for="itemName"> Name: </label>
									<div class="col-sm-6"><input type="text" class="form-control" name="itemName" value="<?php echo $row[1]; ?>"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="itemQTY"> Quantity: </label>
									<div class="col-sm-6"><input type="text" class="form-control" name="itemQTY" value="<?php echo $row[2];?>"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="itemDescription"> Description: </label>
									<div class="col-sm-6"><textarea class="form-control" name="itemDescription" rows="5"><?php echo $row[3];?></textarea></div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="itemPrice"> Price: </label>
									<div class="col-sm-6"><input type="text" class="form-control" name="itemPrice" value="<?php echo $row[4];?>"></div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="purchaseDate"> Date of Purchase: </label>
									<div class="col-sm-6"><input type="date" class="form-control" name="purchaseDate" value="<?php echo $row[5];?>"></div>
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="Submit" class="btn btn-primary" value="Submit">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php	
	                }
	            } 
	            mysqli_close($db);
	        ?>
			<!-- End of Edit Inventory Popup -->

		</div>
	</body>
</html>	
