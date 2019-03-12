<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html">Canitoan Daycare</a>
		</div>
		<ul class="nav navbar-nav">
			<li>
				<a href="ListAttendance.html">Attendance</a>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Students<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li>
						<a href="ListStudents.html">Student List</a>
					</li>
					<li>
						<a href="AddStudents.html">Enroll New Student</a>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Inventory<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li>
						<a href="ListInventory.html">Current Inventory</a>
					</li>
					<li>
						<a href="ListReimbursedInventory.html">Reimbursed Inventory</a>
					</li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="#">
					<span class="glyphicon glyphicon-user"></span> USERNAME HERE
				</a>
			</li>
			<li>
				<a href="#">
					<span class="glyphicon glyphicon-log-out"></span> Log Out
				</a>
			</li>
		</ul>
	</div>
</nav>
<!---
<script type="text/javascript">
	$(document).ready(function() {
		$('.navbar-nav li a').click(function(e) {

			$('.navbar-nav li.active').removeClass('active');

			var $parent = $(this).parent();
			$parent.addClass('active');
			e.preventDefault();
		});
	});
</script>
--->
