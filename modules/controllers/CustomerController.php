<?php
class controllers_CustomerController extends MainController {
    public function loginAction(){
        $this->render('customer/login');
    }

    public function registrationAction(){
        $this->render('customer/registration');
    }

    public function forgotPasswordAction(){
        $this->render('customer/forgotPassword');
    }
}