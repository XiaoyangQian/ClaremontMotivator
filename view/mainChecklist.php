<html>
<head>
    <title>Motivator Checklist</title>
    <link rel='stylesheet' type='text/css' href='/css/bootstrap.min.css'>
    <script src="/js/libs/jquery.js"></script>
    <script src="/js/libs/bootstrap.min.js"></script>
    <script src="/js/registervalidate.js"></script>
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
    // [TODO] switch to get later
    $user_id = 1;
    // Find pair id
    $partner_select = $dbc->prepare("SELECT partner_id FROM users 
													WHERE user_id=?");
    $partner_select->bind_param("i", $user_id);
    $partner_select->execute();
    $partner_select->bind_result($partner_id);
    if ($partner_select->fetch()) {
        echo 'yay' . $partner_id;
    } else {
        echo 'nay';
    }
    $partner_select->free_result();
    $partner_select->close();

    $_SESSION["user_id"] = $user_id;
    $_SESSION["partner_id"] = $partner_id;

    $task_select = $dbc->prepare("SELECT t1.weekday, t1.task as task_1, t2.task as task_2
								FROM 
									(SELECT * FROM tasks where user_id=?) t1,
									(SELECT * FROM tasks where user_id=?) t2
								WHERE 
									t1.week = t2.week and 
									t1.weekday = t2.weekday");

    $task_select->bind_param("ii", $user_id, $partner_id);
    $task_select->execute();
    $result = $task_select->get_result();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $task_1 = $row['task_1'];
            $task_2 = $row['task_2'];
            $weekday = $row['weekday'];
            // [TODO] figure out id to properly save later
            echo '<tr>
								<th scope="row">' . $weekday . '</th>
		      					<td><input class="form-check-input" type="checkbox" id="user1task1" value="user1task1">' . $task_1 . '</td>
		      					<td><input class="form-check-input" type="checkbox" id="user1task1" value="user1task1">' . $task_2 . '</td>
							 </tr>';
        }
    }
    ?>
    </tbody>
</table>
<!-- </form>	 -->
</html>