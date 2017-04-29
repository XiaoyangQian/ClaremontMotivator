<table class="table">
<<<<<<< HEAD
  <thead>
    <tr>
      <th>Weekday</th>
      <th>Myself</th>
      <th>My partner</th>
    </tr>
  </thead>
  <tbody>
	<?php
		foreach ($tasklist as $row) {
				$task_1 = $row->task_1;
				$task_2 = $row->task_2;
				$weekday = $row->weekday;
				echo '<tr>
					<th scope="row">'.$weekday.'</th>
						<td><input class="form-check-input" type="checkbox" id="user1task1" value="user1task1">'.$task_1.'</td>
						<td><input class="form-check-input" type="checkbox" id="user1task1" value="user1task1">'.$task_2.'</td>
				 	</tr>';
		}
	?>	   
  </tbody>
=======
    <thead>
    <tr>
        <th>Weekday</th>
        <th>Myself</th>
        <th>My partner</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($tasklist as $row) {
        $task_1 = $row->task_1;
        $task_2 = $row->task_2;
        $weekday = $row->weekday;
        echo '<tr>
					<th scope="row">' . $weekday . '</th>
						<td><input class="form-check-input" type="checkbox" id="user1task1" value="user1task1">' . $task_1 . '</td>
						<td><input class="form-check-input" type="checkbox" id="user1task1" value="user1task1">' . $task_2 . '</td>
				 	</tr>';
    }
    ?>
    </tbody>
>>>>>>> 3843066bf7482b27d17ad6e925af8ca4c022f38d
</table>