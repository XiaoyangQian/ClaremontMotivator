<?php

class MatchController extends BaseController
{
    private function isOdd()
    {
        return matchStatus::isOdd();
    }

    public function direct()
    {
        if ($this->isOdd()) {
            require_once('view/message/matchPending.php');
        } else {
            matchStatus::update();
            require_once('view/message/matchSuccessful.php');
        }
    }
}

?>