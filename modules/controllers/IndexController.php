<?php
class controllers_IndexController extends MainController {
    public function indexAction(){
        $data['api_count'] = 4;
        $this->render('index/index',$data);
    }
}