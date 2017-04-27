<?php

class PartnerInfoController
{
    public function ls()
    {
        $infoList = InfoRow::getInfo();
        require_once('view/partnerInfoView.php');
    }
}

?>