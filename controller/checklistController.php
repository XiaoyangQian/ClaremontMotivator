<?php

class ChecklistController
{
    public function ls()
    {
        $tasklist = Taskrow::getAllTasks();
        require_once('view/checklist/checklistView.php');
    }
}

?>