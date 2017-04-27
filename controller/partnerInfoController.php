<?php

class PartnerInfoController extends BaseController
{
    public function ls()
    {
        $infoList = (new InfoRow())->getInfo();
        $this->setViewParam('title', "Partner Info");
        $this->setViewParam('infolist', $infoList);
        $this->renderView('/view/message/matchSuccessful.php');
    }
}
