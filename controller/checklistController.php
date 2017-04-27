<?php
	class ChecklistController {
		public function list() {
			$tasklist = Taskrow::getAllTasks();
			require_once('view/checklist/checklistView.php');
		}
	}
?>