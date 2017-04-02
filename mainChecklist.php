<?php
$example = 'example';
$wellArray = array (
'Arrays are a lot of fun.',
'Bootstrap is an amazing development tool to use with PHP',
'With bootstrap you can quickly code and design beautiful websites'
);
?>
<html>
<head>
<title>Checklist</title>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
</head>
<body>
<h1>Short code <?=$example;?></h1>
<? foreach($wellArray as $well) {
 print "<div class='well'>$well</div>";
}
?>
</body>
</html>