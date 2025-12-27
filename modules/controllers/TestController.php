<?php

class controllers_TestController extends MainController {
    public function testAction(){
//        $oCustomers = new Customers();
//        echo '<pre>';
//        print_r($oCustomers->getCustomers(array('username'=>'davit.margaryan16@gmail.com'),array()));
//        echo '</pre>';


//        Mail::send(
//            'davit.margaryan16@gmail.com',
//            'Reset password',
//            "Սեղմիր հղման վրա՝ <a href='{$this->helperUrl(array('controller'=>'index','action'=>'index'))}'>Reset</a>"
//        );
        $mail = new BrevoMail();

        $activation_url = 'https://teampoint.onrender.com/';
        $sent = $mail->send(
            'davit.margaryan16@gmail.com',
            'Test email from Render',
            "<h2>Hello 👋</h2><p><a href='$activation_url'>Reset</a></p>"
        );


    }
}