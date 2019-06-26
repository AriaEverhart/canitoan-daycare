<?php 
	include('session.php'); 

	$id = $_GET['id'];

	$query = "SELECT DATE_FORMAT(date_name, \"%M %d, %Y\")
			  FROM date_list 
			  WHERE date_ID = $id";

    $result = mysqli_query($db, $query);
	$row = mysqli_fetch_row($result);
	$currentDate = $row[0];

	date_default_timezone_set('Asia/Hong_Kong');
?>

<html>
	<head>
		<title>List Attendance</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	      	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
			<link rel="stylesheet" href="css/custom.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
	                    <div class="col-sm-9"><h2><?php echo $currentDate; ?></h2></div>
	                    <div class="col-sm-3">
	                        <div class="form-group" align="right">
	                        	<i>&nbsp;</i>

				                <div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Date
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu dropdown-menu-right">
								  	<?php
				                	$query = 'SELECT date_ID, DATE_FORMAT(date_name, "%M %d, %Y") FROM date_list ORDER BY date_name DESC';
			                        $result = mysqli_query($db, $query)
			                        or die ('query error');

			                        if(!$query)
                            			('Error in query: ' . mysqli_error($query));

                            		if(mysqli_num_rows($result)>0){
			                            while($row = mysqli_fetch_row($result)){
			                                echo"<li><a href='ListAttendance.php?id=".$row[0]."'>$row[1]</a></li>";
										}
									}
			                    	?>								  
								</div>

				            </div>
	                    </div>
	                </div>
	            </div>

				<!--- Table --->
	            <table class="table table-striped table-hover table-bordered">
	            	<!--- Table Header --->
	                <thead>
	                    <tr>
	                        <th>ID  	  </th>
	                        <th> Name     <span class="glyphicon glyphicon-sort" style="font-size: 13px"></span></th>
	                        <th> Time in  </th>
	                        <th> Time Out </th>
	                        <th> Actions  </th>
	                    </tr>
	                </thead>
                <!--- Table Content --->
	                <tbody>
	                	<?php 
		                	$query = "SELECT daily_log.ID,
		                					 student_profile.name,
		                					 TIME_FORMAT(daily_log.Time_In, '%h:%i %p'),
		                					 TIME_FORMAT(daily_log.Time_Out, '%h:%i %p')
	                                         FROM daily_log
	                                         INNER JOIN student_profile on daily_log.student_ID = student_profile.student_ID
	                                         LEFT JOIN date_list on daily_log.date_ID = date_list.date_ID
	                                         WHERE daily_log.date_ID = $id";
	                        $result = mysqli_query($db, $query)
	                        or die ('query error');

	                        if(!$query)
	                            ('Error in query: ' . mysqli_error($query));

	                        if(mysqli_num_rows ($result)>0){
	                            while($row = mysqli_fetch_row($result)){
	                            	$daily_ID=$row[0];
	                                echo"<tr>
		                                    <td>$row[0]</td>
		                                    <td>$row[1]</td> 
		                                    <td>$row[2]</td>";

		                            if($row[3]=="12:00 AM"){
		                            	echo"<td>--</td>";
		                            }
		                            else {
		                            	echo"<td>$row[3]</td>";
		                            }
						?>
	                        <!--- Actions Column --->
	                        <td align="center">	
								<a href="#" title="Time" type="Submit" name = "ID" 
								   value="<?php echo $daily_ID;?>" data-toggle="modal" data-target="#timeOut-<?php echo $row[0];?>" onclick="getTime();">
									<span class="glyphicon glyphicon-time"></span>
								</a>
		                        <a href='deleteAttendance.php?log_id=<?php echo $daily_ID;?>&date_ID=<?php echo $id ?>' title="Delete" data-toggle="tooltip" onClick="return confirm('Delete This Entry	?')">
		                        	<span class="glyphicon glyphicon-trash"></span>
		                        </a>
		                    </td>
							<script>
								$(document).ready(function(){
								  $('[data-toggle="tooltip"]').tooltip(); 
								});
							</script>
	                        </td>
	                        <!--- End of Actions Column --->
	                    </tr>
	                 <?php
	                 		}
                 		}
                 	 ?>
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
	        <!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newAttendancePopup" onclick="getTime();">
			  Add Student
			</button>

			<!-- New Student Attendance Popup -->
			<div class="modal fade" id="newAttendancePopup" tabindex="-1" role="dialog" aria-labelledby="newAttendancePopupLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
							<h5 class="modal-title" id="newAttendancePopupLabel">Check In Student</h5>
						</div>

						<div class="modal-body">
							<form class="form-horizontal" action="addAttendance.php?date_ID=<?php echo $id ?>" method="post">
								<div class="form-group">
									<label class="control-label col-sm-2" for="studentName"> Name: </label>
									<div class="col-sm-7">
										<div class="auto-widget">
											<input type="text" class="form-control" name="studentName" id="studentNameFill">
											<input type="hidden" name="student_ID" id="student_ID">
											<!-- Calls Script for user input auto-suggestion -->
											<script>
												$(function() {
												    $("#studentNameFill").autocomplete({
												        source: "autocomplete.php",
												        select: function( event, ui ) {
												        	$("#studentNameFill").val(ui.item.value);
												            $("#student_ID").val(ui.item.id);
												            return false;
												        }
												    });
												});
											</script>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-2" for="timeIn"> Time In: </label>
									<div class="col-sm-4">
										<div class="input-group">
											<input type="time" id="currentTimeIn" name="currentTimeIn" value="" class="form-control">

								            <span class="input-group-addon">
								            	<span class="glyphicon glyphicon-time"></span>
								       	 	</span>
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
			<!-- End of New Student Attendance Popup -->


			<!-- Time Out Popup -->
				<?php 
			    	"SELECT daily_log.ID,
							student_profile.name,
						 	TIME_FORMAT(daily_log.Time_In, '%H:%i'),
						 	TIME_FORMAT(daily_log.Time_Out, '%H:%i')
		                 	FROM daily_log
			                INNER JOIN student_profile on daily_log.student_ID = student_profile.student_ID
			                LEFT JOIN date_list on daily_log.date_ID = date_list.date_ID
			                WHERE daily_log.date_ID = $id";

			        $result = mysqli_query($db, $query)
			        or die ('query error');

			        if(!$query)
			            ('Error in query: ' . mysqli_error($query));

			        if(mysqli_num_rows ($result)>0){
			            while($row = mysqli_fetch_row($result)){
			    ?>
			 
					<div class="modal fade" id="timeOut-<?php echo $row[0];?>" tabindex="-1" role="dialog" aria-labelledby="timeOutPopupLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
									<h5 class="modal-title" id="timeOutPopupLabel">Check Out Student</h5>
								</div>
								<div class="modal-body">
									<form class="form-horizontal" action="editAttendance.php?date_ID=<?php echo $id;?>" method="post">
									<input type="hidden" name="daily_ID" value="<?php echo $row[0];?>">
									<div class="form-group">
										<label class="control-label col-sm-2" for="studentName"> Name: </label>
										<div class="col-sm-7">
											<div class="auto-widget">
												<input type="text" class="form-control" name="studentName" value="<?php echo $row[1];?>" disabled>
												<input type="hidden" name="student_ID" id="student_ID">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-2" for="timeIn"> Time In: </label>
										<div class="col-sm-4">
											<div class="input-group">
												<input type="text" class="form-control" name="timeIn" value="<?php echo $row[2];?>" >

									            <span class="input-group-addon">
									            	<span class="glyphicon glyphicon-time"></span>
									       	 	</span>
									        </div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-2" for="timeOut-<?php echo $row[0];?>"> Time Out: </label>
										<div class="col-sm-4">
											<div class="input-group">
												<input type="time" id="timeOut" name="timeOut" value="<?php echo date("H:i", time())?>" class="form-control">

									            <span class="input-group-addon" onclick="getTimeOut();">
									            	<span class="glyphicon glyphicon-time"></span>
									       	 	</span>
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

				<?php 
					}}
					mysqli_close($db);
				?>
				<!-- End Time Out Popup -->



			<!-- Gets the current time -->
			<script type="text/javascript">
   	 			function getTime(){
       	 			var date  = new Date(),
						year  = date.getFullYear(),
						month = date.getMonth() + 1,
						day   = date.getDate(),
						hour  = date.getHours(), 
						min   = date.getMinutes();

					hour  = (hour  < 10 ? '0' + hour  : hour );
					min   = (min   < 10 ? '0' + min   : min  );

					$('#currentTimeIn').val(hour + ':' + min);
   	 			}
       	 	</script>


			<!-- Calls Script for user input auto-suggestion -->
			<script>
				$(function() {
				    $("#studentNameFill").autocomplete({
				        source: "autocomplete.php",
				        select: function( event, ui ) {
				        	$("#studentNameFill").val(ui.item.value);
				            $("#student_ID").val(ui.item.id);
				            return false;
				        }
				    });
				});
			</script>
    	</div>
	</body>
</html>	




