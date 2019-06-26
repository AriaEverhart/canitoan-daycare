<?php include('session.php'); ?>

<html>
	<head>
		<title>Student List</title>
		
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="css/custom.css"
	</head>

	<body>
		<!--- Navigation Bar --->
		<div id="navbar"></div>
	    <script>
	    	$("#navbar").load("navbar.php");
	    </script>
	    <!--- End of Navigation Bar --->

		<!--- Body of the page --->
		<div class="container containerBG">
			<!--- Page Info and Search Bar --->
	        <div class="table-wrapper">
	            <div class="table-title">
	                <div class="row">
	                    <div class="col-sm-9"><h2>Student List</h2></div>
	                </div>
	            </div>

				<!--- Table --->
	            <table class="table table-striped table-hover table-bordered">
	            	<!--- Table Header --->
	                <thead>
	                    <tr>
	                        <th> ID            </th>
	                        <th> Name          <span class="glyphicon glyphicon-sort" style="font-size: 13px"></span></th>
	                        <th> Sex           </th>
	                        <th> PWD           </th>
	                        <th> Date of Birth </th>
	                        <th> Address 	   </th>
	                        <th> Actions 	   </th>
	                    </tr>
	                </thead>
	                <!--- Table Content --->
	                <tbody>
                	<?php
	                	$query = 'SELECT student_ID,
            					 name,
            					 sex,
            					 PWD,
            					 date_of_birth,
            					 address
                                 FROM student_profile';
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
								   value="<?php echo"$row[0]";?>" data-toggle="modal" data-target="#editStudent-<?php echo $row[0];?>">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
		                        <a href='deleteStudent.php?id="<?php echo"$row[0]";?>"' title="Delete" data-toggle="tooltip" onClick="return confirm('Delete This Entry	?')">
		                        	<span class="glyphicon glyphicon-trash"></span>
		                        </a>
		                    </td>

		                    <script>
								$(document).ready(function(){
								  $('[data-toggle="tooltip"]').tooltip(); 
								});
							</script>
		                    <!--- End of Actions Column --->	
					<?php	
		                    }
		                } 
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
				<!-- End Pagination -->

            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newStudentPopup">Enroll Student</button>

            	<!-- Enroll New Student Popup -->
            	<div class="modal fade" id="newStudentPopup" tabindex="-1" role="dialog" aria-labelledby="newStudentPopupLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
								<h5 class="modal-title" id="newStudentPopupLabel">Enroll Student</h5>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" action="addStudent.php" method="post">
									<div class="form-group">
										<label class="control-label col-sm-4" for="studentName"> Name: </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="studentName" value="<?php echo $row[1]; ?>">
										</div>
									</div>

									<div class="form-group"> 
										<div class="col-sm-offset-4 col-sm-10">
											<div class="radio-inline"><label><input type="radio" value="Female" name="studentSex"checked="checked"> Male</label></div>
											<div class="radio-inline"><label><input type="radio" value="Male" name="studentSex"> Female</label></div>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4" for="studentDOB"> Date of Birth: </label>
										<div class="col-sm-4">
											<input type="date" class="form-control" name="studentDOB">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4" for="address"> Address: </label>
										<div class="col-sm-6">
											<textarea class="form-control" name="address" rows="5"></textarea> 
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4" for="parentName"> Parent's Name: </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="parentName">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4" for="parentNum"> Contact Number: </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="parentNum">
										</div>
									</div>

									<div class="form-group"> 
										<div class="col-sm-offset-4 col-sm-10">
											<div class="checkbox">
												<label><input type="checkbox" name="PWD" value="Yes"> PWD</label>
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
				<!-- End of New Student Popup -->

				<!-- Edit Student Popup -->
				<?php
	             $query = 'SELECT student_profile.student_ID,
						    	  student_profile.name,
						 		  student_profile.sex,
						 		  student_profile.PWD,
							 	  student_profile.date_of_birth,
						 		  student_profile.address,
						 		  parent.name,
						 		  parent.contact_number
	                     	FROM student_profile
	                     	LEFT JOIN parent
	                     	ON student_profile.student_ID = parent.student_ID';
                $result = mysqli_query($db, $query)
                or die ('query error');

                if(!$query)
                    ('Error in query: ' . mysqli_error($query));

                if(mysqli_num_rows ($result)>0){
                    while($row = mysqli_fetch_row($result)){
				?>
            	<div class="modal fade" id="editStudent-<?php echo $row[0];?>" tabindex="-1" role="dialog" aria-labelledby="editStudentLabel-<?php echo $row[0];?>" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
								<h5 class="modal-title" id="editStudentLabel-<?php echo $row[0];?>">Edit Entry</h5>
							</div>

							<div class="modal-body">
								<form class="form-horizontal" action="editStudent.php" method="post">
									<input type="hidden" name="student_ID" value="<?php echo $row[0];?>">
									<div class="form-group">
										<label class="control-label col-sm-4" for="studentName"> Name: </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="studentName" value="<?php echo $row[1]; ?>">
										</div>
									</div>

									<div class="form-group"> 
										<div class="col-sm-offset-4 col-sm-10">
											<?php
											switch($row[2]){
												case "Female":
													echo "<div class='radio-inline'><label><input type='radio' value='Male' name='studentSex'> Male</label></div>";
													echo "<div class='radio-inline'><label><input type='radio' value='Female' name='studentSex' checked='checked'> Female</label></div>";
													break;
												case "Male":
													echo "<div class='radio-inline'><label><input type='radio' value='Male' name='studentSex' checked='checked'> Male</label></div>";
													echo "<div class='radio-inline'><label><input type='radio' value='Female' name='studentSex'> Female</label></div>";
													break;
												default: 
													echo "<div class='radio-inline'><label><input type='radio' value='Male' name='studentSex'> Male</label></div>";
													echo "<div class='radio-inline'><label><input type='radio' value='Female' name='studentSex'> Female</label></div>";
													break;
											}?>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4" for="studentDOB"> Date of Birth: </label>
										<div class="col-sm-4">
											<input type="date" class="form-control" name="studentDOB" value="<?php echo $row[4];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4" for="address"> Address: </label>
										<div class="col-sm-6">
											<textarea class="form-control" name="address" rows="5"><?php echo $row[5];?></textarea> 
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4" for="parentName"> Parent's Name: </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="parentName"value="<?php echo $row[6];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-sm-4" for="parentNum"> Contact Number: </label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="parentNum" value="<?php echo $row[7];?>">
										</div>
									</div>

									<div class="form-group"> 
										<div class="col-sm-offset-4 col-sm-10">
											<div class="checkbox">
												<?php
													if($row[3]=="Yes"){
														echo"<label><input type='checkbox' name='PWD' value='Yes' checked='checked'> PWD</label>";
													}

													else{
														echo"<label><input type='checkbox' name='PWD' value='Yes'> PWD</label>";
													}
												?>
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
	                    }
	                } 
                    mysqli_close($db);
                ?>
				<!-- End of Edit Student Popup -->

	        </div>
		</div>
	</body>
</html>	
