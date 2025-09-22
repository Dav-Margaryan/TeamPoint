<?php
$functionName = $_POST['functionName'];
$oTaskCon = new MethodsController;
if($functionName == 'loadTasksTable'){
    $oTaskCon->dataAction();
}elseif($functionName == 'save'){
    $oTaskCon->saveTaskAction();
}elseif($functionName == 'edit'){
    $oTaskCon->formAction();
}elseif($functionName == 'delete'){
    $oTaskCon->deleteAction();
}elseif($functionName == 'search'){
    $title = $_POST['title'];
    $date = $_POST['date'];
    $oTaskCon->dataAction(array('date' => $date,'title' => $title));
}




class MethodsController{
    public function dataAction($search = array()){
        include_once "../../DV_Controllers.php";
        $oTask = new Tasks();
        if(empty($search)){
            $oTask->getTask();
        }else {
            if (empty($search['date']) && empty($search['title'])) {
                $oTask->getTask();
            } elseif (empty($search['date']) && !empty($search['title'])) {
                $oTask->getTask(array('title' => $search['title']));
            } elseif (!empty($search['date']) && empty($search['title'])) {
                $oTask->getTask(array('date' => $search['date']));
            }elseif (!empty($search['date']) && !empty($search['title'])) {
                $oTask->getTask(array('date' => $search['date'],'title' => $search['title']));
            }
        }
    }

    public function saveTaskAction(){
        include_once "../../DV_Controllers.php";
        $taskName = $_POST['taskName'];
        Logger::logDebugInformation($_POST);
        $newTaskName = $_POST['newTaskName'];
        if($taskName && !$newTaskName){
            $taskName = $taskName;
        }elseif($taskName && $newTaskName && $newTaskName != 'undefined'){
            $taskName = $newTaskName;
        }
        $oTask = new Tasks();
        $id = $_POST['id'];
        try {
            if (gettype($taskName) == "string" && $taskName == 'undefined') {
                throw new App_Exception_NonCritical('Task name is empty');
            } elseif (empty($id)) {
                throw new App_Exception_NonCritical('Task ID is empty');
            } else {
                $is_active = $_POST['is_active'];
                $data = array();
                $data['title'] = $taskName;
                if ($is_active === true) {
                    $data['is_active'] = 1;
                } else {
                    $data['is_active'] = 0;
                }
                if (empty($id)) {
                    $oTask->addTask($taskName);
                } else {
                    $oTask->updateTask($id, $data);
                }
            }
        }catch (App_Exception_NonCritical $e){
            $error = array();
            $error['message'] = $e->getMessage();
            die(json_encode($error));
        }
    }

    public function formAction(){
        include_once "../../DV_Controllers.php";
        $id = $_POST['id'];
        $oTask = new Tasks();
        $oTask->getTask(array('id' => $id));
    }

    public function deleteAction(){
        include_once "../../DV_Controllers.php";
        $id = $_POST['id'];
        $oTask = new Tasks();
        $oTask->deleteTask($id);
    }
}