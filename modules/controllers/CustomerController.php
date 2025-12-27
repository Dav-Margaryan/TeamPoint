<?php
class controllers_CustomerController extends MainController {
    public function loginAction(){
        $oRequest = $_POST;
        $error_messages = array();

        if(!empty($oRequest['username'])){
            $oCustomers = new Customers();
            $customer_data = $oCustomers->getCustomers(array('username' => $oRequest['username']),array('id','pw'));
            $customer_data = empty($customer_data)||count($customer_data)>1?$customer_data:$customer_data[0];

            if(empty($customer_data)) {
                $error_messages['message'] = 'Ծածկանունը կամ գաղտնաբառը սխալ են լրացված';
                $error_messages['username']['val'] = $oRequest['username'];
            }elseif(md5($oRequest['password']) != $customer_data['pw'])
                $error_messages['message'] = 'Ծածկանունը կամ գաղտնաբառը սխալ են լրացված';
            else {
                $_SESSION['user_id'] = $customer_data['id'];
                header("Location: ".$this->helperUrl(array('controller'=>'project','action'=>'index')));
                exit;
            }
        }

        $this->render('customer/login',array('error_message'=>$error_messages));
    }

    public function logoutAction(){
        unset($_SESSION['user_id']);
        header('Location: '.BASE_URL);
        die();
    }

    public function registrationAction(){
        $oRequest = $_POST;
        $error_messages = array();
        if(!empty($oRequest)){
            $oCustomer = new Customers();
            $customer_data = $oCustomer->getCustomers(array('username' => $oRequest['email']),array('id'));
            $customer_data = empty($customer_data)||count($customer_data)>1?$customer_data:$customer_data[0];
            if(!empty($customer_data))
                $error_messages['email'] = 'Այս էլ․ հասցեով կա գրանցված օգտվող';
            else
                if(strlen($oRequest['password']) < 6)
                    $error_messages['password'] = 'Գաղտնաբառը պետք է պարունակի առնվազն 6 նիշ';
                elseif($oRequest['password'] != $oRequest['password_repeat'])
                    $error_messages['password_repeat'] = 'Գաղտնաբառերը չեն համնկնում';

            if(empty($error_messages)){
                Mail::send(
                    $email,
                    'Reset password',
                    "Սեղմիր հղման վրա՝ <a href='https://site.com/reset/$token'>Reset</a>"
                );
            }

        }

        unset($oRequest['password']);
        unset($oRequest['password_repeat']);
        $this->render('customer/registration',array('error_message' => $error_messages,'data' => $oRequest));
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