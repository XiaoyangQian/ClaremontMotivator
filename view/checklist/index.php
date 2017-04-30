<?php
$program = view_param_raw('program');
$user = view_param_raw('user');
$partner = view_param_raw('partner');

// $segments_dict[$user_id][$day_id] : ProgramSegment
$segments_dict = view_param_raw('segments_dict');
?>
<div class="alert alert-success">
    The program started on <?= $program->start_date ?>, your partner
    is <a target="_blank" href="<?= get_link('partner', 'info') ?>"><?= $partner->firstname ?> <?= $partner->lastname ?>
        (view
        info)</a>
</div>

<form action="<?= get_link('checklist', 'update') ?>" method="post">
    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>Weekday</th>
            <th>Myself</th>
            <th>Finished</th>
            <th>My partner</th>
            <th>Finished</th>
        </tr>
        </thead>
        <tbody>

        <?php

        for ($day_i = 1; $day_i <= 7; $day_i++) {
            ?>
            <tr>
                <td>
                    <?= $day_i ?>
                </td>
                <td>
                    <?= @$segments_dict[$user->user_id][$day_i]->title ?>
                </td>
                <td>
                    <input type="checkbox"
                        <?= @$segments_dict[$user->user_id][$day_i]->finished ? "checked" : "" ?> disabled>
                </td>
                <td>
                    <?= @$segments_dict[$partner->user_id][$day_i]->title ?>
                </td>
                <td>
                    <input type="checkbox"
                           name="segment_id_<?= @$segments_dict[$partner->user_id][$day_i]->program_segment_id ?>"
                        <?= @$segments_dict[$partner->user_id][$day_i]->finished ? "checked disabled" : "" ?>
                           onchange="showConfirmButton()">
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <div style="text-align: right;display: none" id="confirmChange">
        <button type="submit" class="btn btn-primary">
            Confirm Changes
        </button>
    </div>
</form>


<script>
    function showConfirmButton() {
        $('#confirmChange').css('display', 'block');
    }
</script>