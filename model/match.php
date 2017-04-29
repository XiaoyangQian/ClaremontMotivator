<?php

class MatchStatus extends BaseModel
{
    public function isOdd()
    {
        $count_select = $this->dbc->prepare("SELECT COUNT(*) FROM users");
        $count_select->execute();
        $count_select->bind_result($num_users);
        if ($count_select->fetch()) {
            if ($num_users % 2 == 0) {
                $result = false;
            } else {
                $result = true;
            }
        } else {
            echo 'nay';
        }

        $count_select->free_result();
        $count_select->close();
        return $result;
    }

    public function update()
    {

        $first_select = $this->dbc->prepare("SELECT user_id FROM users WHERE partner_id IS NULL LIMIT 1");
        $first_select->execute();
        $first_select->bind_result($first_id);
        if ($first_select->fetch()) {

        } else {
            echo 'nay';
        }

        $second_select = $this->dbc->prepare("SELECT user_id FROM users WHERE partner_id IS NULL AND user_id <> ?");
        $second_select->bind_param("i", $first_id);
        $second_select->execute();
        $second_select->bind_result($second_id);

        $first_update = $this->dbc->prepare("UPDATE users SET partner_id=? WHERE user_id=?");
        $first_update->bind_param("ii", $second_id, $first_id);
        $first_update->execute();

        $second_update = $this->dbc->prepare("UPDATE users SET partner_id=? WHERE user_id=?");
        $second_update->bind_param("ii", $first_id, $second_id);
        $second_update->execute();

        $pair_insert = $this->dbc->prepare("INSERT INTO pairs (user_id1, user_id2) VALUES(?,?)");
        $pair_insert->bind_param("ii", $first_id, $second_id);
        $pair_insert->execute();
        $pair_insert->close();

        $first_select->free_result();
        $first_select->close();
        $second_select->free_result();
        $second_select->close();
        $first_update->close();
        $second_update->close();

    }
}
