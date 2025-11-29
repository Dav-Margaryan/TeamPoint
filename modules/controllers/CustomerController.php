<?php
class controllers_CustomerController extends MainController {
    public function loginAction(){
        $this->render('customer/login');
    }

    public function logoutAction(){
        unset($_SESSION['user_id']);
        header('Location: '.BASE_URL);
        die();
    }

    public function registrationAction(){
        $this->render('customer/registration');
    }

    public function forgotPasswordAction(){
        $this->render('customer/forgotPassword');
    }

    public function changePasswordAction(){
        $this->render('customer/changePassword');
    }

    public function personalAccountAction(){
        $data = array(
            'name' => 'Դավիթ',
            'lastname' => 'Մարգարյան',
            'email' => 'davit.margaryan16@gmail.com'
        );
        $this->render('customer/personalAccount',$data);
    }
}