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
    <link rel='stylesheet' type='text/css' href='/css/styles.css'>
    <script src="/js/registervalidate.js"></script>
</head>
<body>
<div class="jumbotron text-center">
    <h1 style="font-size: 40pt">Claremont Motivator</h1>
    <p>Let's put procrastination to a stop...</p>
</div>
<div class="container">
    <?php
    session_message();
    ?>
    <?php
    render_content();
    ?>
</div>

<?php
if (@$_SESSION['user']) {
    ?>
    <div class="logout">
        Hello, <?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?>
        <a href="<?=get_link("auth", 'logout') ?>">Logout</a>
    </div>
    <?php
}
?>
</body>
</html>
