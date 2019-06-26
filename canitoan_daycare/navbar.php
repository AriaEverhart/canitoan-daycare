<?php include('session.php'); ?>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="homepage.php">Canitoan Daycare</a>
		</div>
		<ul class="nav navbar-nav">
			<li>
				<a href="ListDates.php">Attendance</a>
			</li>
			<li>
				<a href="ListStudents.php">Students</a>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown">Inventory<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li>
						<a href="ListInventory.php">Current Inventory</a>
					</li>
					<li>
						<a href="ListReimbursedInventory.php">Reimbursed Inventory</a>
					</li>
				</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="#">
					<span class="glyphicon glyphicon-user"></span> <?php echo $login_session; ?>
				</a>
			</li>
			<li>
				<a href="index.php">
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
