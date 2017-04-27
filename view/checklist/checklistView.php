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
</table>