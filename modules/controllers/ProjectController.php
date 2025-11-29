<?php
class controllers_ProjectController extends MainController {
    public function indexAction(){
        $_SESSION['user_id'] = 1;

        $data['project_api_list'] = array(
            0 => array(
                'id' => 1,
                'title' => 'Project 1',
                'api_list' => array(
                    0 => array(
                        'id' => 1,
                        'title' => 'Api 1',
                    ),
                    1 => array(
                        'id' => 2,
                        'title' => 'Api 2',
                    ),
                    2 => array(
                        'id' => 3,
                        'title' => 'Api 3',
                    )
                )
            ),
            2 => array(
                'id' => 2,
                'title' => 'Project 2',
                'api_list' => array(
                    0 => array(
                        'id' => 4,
                        'title' => 'Api 4',
                    ),
                    1 => array(
                        'id' => 5,
                        'title' => 'Api 5',
                    ),
                    2 => array(
                        'id' => 6,
                        'title' => 'Api 6',
                    )
                )
            )
        );
        $this->render('project/index',$data);
    }

    public function formAction(){
        $this->render('project/form');
    }

    public function saveAction(){

    }
}