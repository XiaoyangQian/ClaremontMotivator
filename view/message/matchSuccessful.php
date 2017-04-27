<div class="container">
    <h1>Congratulations! We have matched you a motivating partner!</h1>

    <table>
        <?php
        global $view_params;
        foreach ($view_params['infolist'] as $key => $value) {
            echo '<tr><td>' . $key . ':    </td><td>' . $value . '</td></tr>';
        }
        ?>
    </table>
    <a href="/view/checklist/main.php" class="btn btn-primary" role="button">Continue!</a>
</div>