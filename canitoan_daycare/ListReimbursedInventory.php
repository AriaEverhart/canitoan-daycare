<?php include('session.php'); ?>

<html>
	<head>
		<title>Reimbursed Inventory</title>
		
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
	                    <div class="col-sm-9"><h2>Reimbursed Inventory</h2></div>
	                    <div class="col-sm-3">
	                        <div class="form-group">
	                        	<i>&nbsp;</i>
				                <div class='input-group date' id='datetimepicker1'>
				                    <input type='text' class="form-control" />
				                    <span class="input-group-addon">
				                        <span class="glyphicon glyphicon-calendar"></span>
				                    </span>
				                </div>
				                <script type="text/javascript">
						            $(function () {
						                $('#datetimepicker1').datetimepicker();
						            });
						        </script>
				            </div>
	                    </div>
	                </div>
	            </div>

				<!--- Table --->
	            <table class="table table-striped table-hover table-bordered">
	            	<!--- Table Header --->
	                <thead>
	                    <tr>	 
	                        <th> ID       	 	   	   </th>
	                        <th> Name <span class="glyphicon glyphicon-sort" style="font-size: 13px"></span></th>
	                        <th> Qty	     	  	   </th>
	                        <th> Description 	 	   </th>
	                        <th> Reimbursed Amount	   </th>
	                        <th> Date of Reimbursement </th>
	                        <th> Actions	 	  	   </th>
	                    </tr>
	                </thead>
	                <!--- Table Content --->
	                <tbody>
	                    <tr>
	                        <td> 1	    		 </td>
	                        <td> Rice 	  	 	 </td>
	                        <td> 30     	  	 </td>
	                        <td> Feeding Program </td>
	                        <td> 1,500		     </td>
	                        <td> March 15, 2019  </td>

	                        <!--- Actions Column --->
	                        <td align="center">	
								<a href="#" class="view" title="Edit" data-toggle="tooltip">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
	                            <a href="#" class="edit" title="Delete" data-toggle="tooltip">
	                            	<span class="glyphicon glyphicon-trash"></span>
	                            </a>
								<script>
									$(document).ready(function(){
									  $('[data-toggle="tooltip"]').tooltip(); 
									});
								</script>
	                        </td>
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
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</div>
	        </div>
		</div>
	</body>
</html>	
