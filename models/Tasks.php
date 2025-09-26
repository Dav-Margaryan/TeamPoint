<?php
class Tasks{
    protected $TASKS_TABLE = 'tasks_data';

    public function getTask($search = array()){
        Logger::logDebugInformation('here');
        $dba = new MySQL();
        $where = array();
        $_where = '';
        if(!empty($search['id'])){
            $_where = 'WHERE ';
            $where['id'] = $search['id'];
        }else {
            if (!empty($search['date']) && !empty($search['title'])) {
                $_where = 'WHERE ';
                $where['date'] = $search['date'];
                $where['title'] = trim($search['title']);
            } else {
                if (!empty($search['date'])) {
                    $_where = 'WHERE ';
                    $where['date'] = $search['date'];
                }
                if (!empty($search['title'])) {
                    $_where = 'WHERE ';
                    $where['title'] = trim($search['title']);
                }
            }
        }
        foreach ($where as $key => $value){
            $_where .= $key ."='".$value."'";
        }

        $query = "SELECT * FROM $this->TASKS_TABLE $_where";

        $dba->query($query);
    }

    public function addTask($taskName){
        $title = $taskName;
        $date = date("Y-m-d");
        $is_active = 1;
        $query = "INSERT INTO $this->TASKS_TABLE (title ,date ,is_active) VALUES ('$title','$date','$is_active')";
        $dba = new MySQL();
        $dba->query($query);
    }

    public function updateTask($id,$data){
        $dba = new MySQL();
        $title = $data['title'];
        $date = date("Y-m-d");
        $is_active = $data['is_active'];
        $query = "UPDATE $this->TASKS_TABLE SET title = '$title',date = '$date',is_active = '$is_active'  WHERE id = $id";
        $dba->query($query);
    }

    public function deleteTask($id){
        $dba = new MySQL();
        $id = abs(intval($id));
        $query = "DELETE  FROM $this->TASKS_TABLE  WHERE id = $id";
        $dba->query($query);
    }
}