<?php

class controllers_TestController extends MainController {
    public function testAction(){
//        $oCustomers = new Customers();
//        echo '<pre>';
//        print_r($oCustomers->getCustomers(array('username'=>'davit.margaryan16@gmail.com'),array()));
//        echo '</pre>';


        Mail::send(
            'davit.margaryan16@gmail.com',
            'Reset password',
            "Սեղմիր հղման վրա՝ <a href='{$this->helperUrl(array('controller'=>'index','action'=>'index'))}'>Reset</a>"
        );
    }
}