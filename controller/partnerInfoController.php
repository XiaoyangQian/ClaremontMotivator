<?php
	class PartnerInfoController{
		public function list(){
			$infoList = InfoRow::getInfo();
			require_once('view/partnerInfoView.php');
		}
	}
?>