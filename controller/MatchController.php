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
            require_once('message/matchPending');
        } else {
            matchStatus::update();
            require_once('message/matchSuccessful');
        }
    }
}
