<?php

class PartnerInfoController
{
    public function ls()
    {
        $infoList = (new InfoRow())->getInfo();
        require_once('view/partnerInfoView.php');
    }
}

?>