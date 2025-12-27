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
        foreach ($oRequest as $key => $value)
            $oRequest[$key] = htmlspecialchars($value);
        $error_messages = array();
        if(!empty($oRequest)){
            $oCustomer = new Customers();

            if(empty($oRequest['name']))
                $error_messages['message'] = 'Լրացրեք անուն դաշտը';
            elseif(empty($oRequest['lastname']))
                $error_messages['message'] = 'Լրացրեք ազգանուն դաշտը';
            elseif(empty($oRequest['email']))
                $error_messages['message'] = 'Լրացրեք էլ․ հասցե դաշտը';
            elseif(!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/', $oRequest['email']))
                $error_messages['message'] = 'Լրացրեք վավեր էլ․ հասցե';
            elseif(empty($oRequest['password']))
                $error_messages['message'] = 'Լրացրեք գաղտնաբառ դաշտը';
            elseif(empty($oRequest['password_repeat']))
                $error_messages['message'] = 'Լրացրեք կրկնել գաղտնաբառ դաշտը';

            $customer_data = $oCustomer->getCustomers(array('username' => $oRequest['email']),array('id'));
            $customer_data = empty($customer_data)||count($customer_data)>1?$customer_data:$customer_data[0];
            if(!empty($customer_data))
                $error_messages['message'] = 'Լրացված էլ․ հասցեով կա գրանցված օգտվող';
            else
                if(strlen($oRequest['password']) < 6)
                    $error_messages['message'] = 'Գաղտնաբառը պետք է պարունակի առնվազն 6 նիշ';
                elseif($oRequest['password'] != $oRequest['password_repeat'])
                    $error_messages['password'] = 'Գաղտնաբառերը չեն համնկնում';

                if($oRequest['password'] == $oRequest['email'])
                    $error_messages['message'] = 'Էլ․ հասցե և գաղտնաբառ դաշտը նույնը լրացնելով դարձնում եք Ձեր հաշիվը խոցելի';

            if(empty($error_messages)){
                $insert_data = array(
                    'username' => trim($oRequest['email']),
                    'name' => trim($oRequest['name']),
                    'lastname' => trim($oRequest['lastname']),
                    'pw' => md5($oRequest['password']),
                    'is_active' => 0,
                    'activation_key' => $oCustomer->genActKey(),
                    'reg_date' => date('Y-m-d H:i:s')
                );

                $mail = new BrevoMail();
                $mail->send(
                    $insert_data['username'],
                    'Գրանցումը գրեթե պատրաստ է 🚀',
                    "<br>Բարև 👋<br><br>

                          Ուրախ ենք, որ միանում ես մեզ 🎉<br>
                          Մնում է ընդամենը մեկ փոքր քայլ՝ հաստատել քո էլ․ հասցեն։<br><br>
                           
                          Սեղմիր այստեղ 👇<br>
                          👉 <a href='https://teampoint.onrender.com/Customer/login?activation_key={$insert_data["activation_key"]}'>Գրանցման հաստատում</a>
                            <br><br>
                          Եթե սա դու չես եղել, պարզապես անտեսիր նամակը 🙌<br><br>
                            
                          Շնորհակալություն, որ մեզ հետ ես 💙<br><br>Սիրով` <h1><b><img src='../../resources/images/TeamPointIco.png'>TeamPoint</b></h1>"
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