<div class="container">
    <h1>Congratulations! We have matched you a motivating partner!</h1>

    <table>
        <?php
        foreach ($infoList as $key => $value) {
            echo '<tr><td>' . $key . ':    </td><td>' . $value . '</td></tr>';
        }
        ?>
    </table>
    <a href="/view/mainChecklist.php" class="btn btn-primary" role="button">Continue!</a>

</div>