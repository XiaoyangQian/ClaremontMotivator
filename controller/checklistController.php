<?php

class ChecklistController extends BaseController
{
    public function ls()
    {
        $tasklist = Taskrow::getAllTasks();
        $this->setViewParam('tasklist', $tasklist);
        $this->renderView('/view/checklist/checklistView.php');
    }
}

?>