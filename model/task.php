<?php
<<<<<<< HEAD
	class Taskrow {
		public $weekday;
		public $task_1;
		public $task_2;

		public function __construct($weekday, $task_1, $task_2){
			$this->weekday 		= $weekday;
			$this->task_1 		= $task_1;
			$this->task_2		= $task_2;
		}

		public static function getAllTasks(){
			$tasklist = [];
			$dbc = connect_to_db("motivator");
			// [TODO] switch to get later
			$user_id = 1;
			// Find pair id
			$partner_select = $dbc->prepare("SELECT partner_id FROM users 
												WHERE user_id=?");
			$partner_select->bind_param("i", $user_id);
			$partner_select->execute();
			$partner_select->bind_result($partner_id);
			if ($partner_select->fetch()) {
				echo 'yay'.$partner_id;
			} else {
				echo 'nay';
			}
			$partner_select->free_result();
			$partner_select->close();

			$_SESSION["user_id"] = $user_id;
			$_SESSION["partner_id"] = $partner_id;

			$task_select =  $dbc->prepare("SELECT t1.weekday, t1.task as task_1, t2.task as task_2
=======

class Taskrow extends BaseModel
{
    public $weekday;
    public $task_1;
    public $task_2;

    public function __construct($weekday, $task_1, $task_2)
    {
        parent::__construct();
        $this->weekday = $weekday;
        $this->task_1 = $task_1;
        $this->task_2 = $task_2;
    }

    public function getAllTasks()
    {
        $tasklist = [];
        // [TODO] switch to get later
        $user_id = 1;
        // Find pair id
        $partner_select = $this->dbc->prepare("SELECT partner_id FROM users 
												WHERE user_id=?");
        $partner_select->bind_param("i", $user_id);
        $partner_select->execute();
        $partner_select->bind_result($partner_id);
        if ($partner_select->fetch()) {
            echo 'yay' . $partner_id;
        } else {
            echo 'nay';
        }
        $partner_select->free_result();
        $partner_select->close();

        $_SESSION["user_id"] = $user_id;
        $_SESSION["partner_id"] = $partner_id;

        $task_select = $this->dbc->prepare("SELECT t1.weekday, t1.task as task_1, t2.task as task_2
>>>>>>> 3843066bf7482b27d17ad6e925af8ca4c022f38d
							FROM 
								(SELECT * FROM tasks where user_id=?) t1,
								(SELECT * FROM tasks where user_id=?) t2
							WHERE 
								t1.week = t2.week and 
								t1.weekday = t2.weekday");

<<<<<<< HEAD
			$task_select->bind_param("ii", $user_id, $partner_id);
			$task_select->execute();
			$result = $task_select->get_result();
			if($result){					
				while( $row = $result->fetch_assoc() ){
					$tasklist[] = new Taskrow($row['weekday'], $row['task_1'], $row['task_2']);
				}
			}
			$task_select->free_result();
			$task_select->close();
			return $tasklist;													
		}
	}
?>
=======
        $task_select->bind_param("ii", $user_id, $partner_id);
        $task_select->execute();
        $result = $task_select->get_result();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $tasklist[] = new Taskrow($row['weekday'], $row['task_1'], $row['task_2']);
            }
        }
        $task_select->free_result();
        $task_select->close();
        return $tasklist;
    }
}
>>>>>>> 3843066bf7482b27d17ad6e925af8ca4c022f38d
