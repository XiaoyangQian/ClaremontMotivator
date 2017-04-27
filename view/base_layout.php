<html>
<head>
    <title>
        <?php
        view_param('title');
        ?>
    </title>
    <script src="/js/libs/jquery.js"></script>
    <script src="/js/libs/bootstrap.min.js"></script>
    <link rel='stylesheet' type='text/css' href='/css/bootstrap.min.css'>
    <script src="/js/registervalidate.js"></script>
</head>
<body>
<div class="jumbotron text-center">
    <h1 style="font-size: 40pt">Claremont Motivator</h1>
    <p>Let's put procrastination to a stop...</p>
</div>

<?php
render_content();
?>

</body>
</html>
