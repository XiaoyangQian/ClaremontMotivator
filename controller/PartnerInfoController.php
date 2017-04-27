<?php

class PartnerInfoController extends BaseController
{
    public function ls()
    {
        $this->requiresLogin();
        $infoList = (new InfoRow())->getInfo();
        $this->setViewParam('title', "Partner Info");
        $this->setViewParam('infolist', $infoList);
        $this->renderView('message/matchSuccessful');
    }
}
