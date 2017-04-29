<?php

class User extends BaseModel
{
    public static $table = "users";
    public static $primaryKey = "user_id";
    public static $cols = [
        'user_id', 'firstname', 'lastname', 'password', 'email', 'ready_state'
    ];


    public function getProgram()
    {
        $program = Program::findFirst(['user_id1' => $this->user_id]);
        if ($program) {
            return $program;
        }

        $program = Program::findFirst(['user_id2' => $this->user_id]);
        if ($program) {
            return $program;
        }
        return null;
    }

    public function getPartner()
    {
        $program = Program::findFirst(['user_id1' => $this->user_id]);
        if ($program) {
            return User::find($program->user_id2);
        }

        $program = Program::findFirst(['user_id2' => $this->user_id]);
        if ($program) {
            return User::find($program->user_id1);
        }
        return null;
    }
}