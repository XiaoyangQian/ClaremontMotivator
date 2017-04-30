<?php
$partner = view_param_raw('partner');
?>
<h2>Partner Info</h2>
<table class="table table-hover table-bordered table-striped">
    <tbody>
    <tr>
        <td>
            First Name
        </td>
        <td>
            <?= $partner->firstname ?>
        </td>
    </tr>
    <tr>
        <td>
            Last Name
        </td>
        <td>
            <?= $partner->lastname ?>
        </td>
    </tr>
    <tr>
        <td>
            Email
        </td>
        <td>
            <?= $partner->email ?>
        </td>
    </tr>
    </tbody>
</table>

<div style="text-align: center;margin: 20px 0 4px 0;">
    <a href="<?= get_link('checklist', 'index') ?>" class="btn btn-default">
        Go Back
    </a>
</div>