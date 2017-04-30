<?php

class PartnerController extends BaseController
{
    public function info()
    {
        $this->requiresLogin();
        $user = $this->getCurrentUser();
        if ($user->ready_state != 3) {
            $this->showErrorAndTerminate("You've got no partner!");
        }
        $partner = $user->getPartner();
        $this->setViewParam('partner', $partner);
        $this->renderView('partner/info');
    }
}