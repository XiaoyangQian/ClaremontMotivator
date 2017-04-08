<html>
<head>
	<title>Motivator Checklist</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>

<body>

</body>
	<!-- Topic section -->
	<div class="jumbotron text-center">
		<!-- Embedded Styling -->
		<h1 style="font-size: 40pt">Claremont Motivator</h1>
		<p>Let's put procrastination to a stop...</p>
	</div>

	<!-- <form class="form-horizontal" role="form" method="post"> -->
		<table class="table">
		  <thead>
		    <tr>
		      <th>Weekday</th>
		      <th>Myself</th>
		      <th>My partner</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php
				include("dbconn.php");
				$dbc = connect_to_db("motivator");
				// TODO fix query
				$task_select = "SELECT * FROM tasks";
				if($result = $dbc->query($task_select)){					
					while( $row = $result->fetch_assoc() ){
						$task1 = $row['task1'];
						$task2 = $row['task2'];
						$weekday = $row['weekday'];
						// TODO figure out id to properly save later
						echo '<tr>
								<th scope="row">'.$weekday.'</th>
		      					<td><input class="form-check-input" type="checkbox" id="user1task1" value="user1task1">'.$task1.'</td>
		      					<td><input class="form-check-input" type="checkbox" id="user2task1" value="user1task1">'.$task2.'</td>
							 </tr>';
					}
				}

			?>	   
		  </tbody>
		</table>
	<!-- </form>	 -->
</html>