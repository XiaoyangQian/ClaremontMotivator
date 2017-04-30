<div class="container">

    <h1>Congratulations! We have matched you a motivating partner!</h1>

    <h2>What would you like to do?</h2>
    <form class="form-horizontal" action="" method="POST">

        <?php
        for ($i = 1; $i <= 7; $i++) {

            ?>
            <div class="form-group">
                <label for="input<?= $i ?>" class="col-sm-2 control-label">Day <?= $i ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="input<?= $i ?>" required name="input<?= $i ?>">
                </div>
            </div>
            <?php
        }
        ?>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>