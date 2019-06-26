<?php include('session.php'); ?>

<html>
	<head>
		<title>List Attendance</title>
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


		<!--- Body of the page --->
		<div class="container">

			<!--- Page Info and Search Bar --->
	        <div class="table-wrapper">
	            <div class="table-title">
	                <div class="row">
	                    <div class="col-sm-9"><h2>Daily Attendance</h2></div>
	                </div>
	            </div>

				<!--- Table --->
	            <table class="table table-striped table-hover table-bordered text-center">
	            	<!--- Table Header --->
	                <thead>
	                    <tr>
	                        <th class="text-center">Date    </th>
	                    </tr>
	                </thead>
	                <!--- Table Content --->
	                <tbody>
	                    <?php
		                	$query = 'SELECT date_ID, 
		                			  DATE_FORMAT(date_name, "%M %d, %Y [%W]") FROM date_list ORDER BY date_name DESC';
	                        $result = mysqli_query($db, $query)
	                        or die ('query error');

	                        if(!$query)
	                			('Error in query: ' . mysqli_error($query));

	                		if(mysqli_num_rows($result)>0){
	                            while($row = mysqli_fetch_row($result)){
	                            	echo"<tbody><tr>";
	                                echo"<td><a href='ListAttendance.php?id=".$row[0]."'>$row[1]</a></td>";

	
			                    } //Ends Loop
			                } 
	                        mysqli_close($db);
	                    ?>
		                	

	                        
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
	        <!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newDatePopup">
			  Add Date
			</button>

			<!-- New Date Attendance Popup -->
			<div class="modal fade" id="newDatePopup" tabindex="-1" role="dialog" aria-labelledby="newDatePopupLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							<h5 class="modal-title" id="newDatePopupLabel">Add Date</h5>
						</div>

						<div class="modal-body">
							<form class="form-horizontal" action="addDate.php" method="post">
								<div class="form-group">
									<label class="control-label col-sm-4" for="date"> Date: </label>
									<div class="col-sm-4">
										<div class="input-group">
											<input type="date" class="form-control" id="currentDate" name="date" value="<?php echo date("Y-m-d");?>">
								       	</div>
					       	 		</div>
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
			<!-- End of Popup -->
    	</div>
	</body>
</html>	




