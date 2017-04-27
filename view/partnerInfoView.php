<div class="container">
		<h1>Congratulations! We have matched you a motivating partner!</h1>
			
			<table>
			<?php
				foreach($infoList as $key => $value){
					echo '<tr><td>'. $key. ':    </td><td>' . $value. '</td></tr>';
				}
			?>
			</table>
			<?php
			$controller = 'checklist';
			$action = 'action';
			$_GET['controller'] = 'checklist';
			$_GET['action'] = 'list';

			?>
			<a href="./routes.php" class="btn btn-primary" role="button">Continue!</a>

</div>