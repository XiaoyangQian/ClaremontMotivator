<?php
class MatchController{
	private function isOdd(){
		return matchStatus::isOdd();
	}

	public function direct(){
		if($this->isOdd()){
			require_once('view/notMatchedView.php');
		} else {
			matchStatus::update();
			require_once('view/partnerInfoView.php');
		}
	}
}

?>