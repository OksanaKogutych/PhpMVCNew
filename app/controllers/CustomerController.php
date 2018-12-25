<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerController
 *
 * @author Оксана
 */
class CustomerController extends Controller{
    public function ListAction()
    {
        $this->setTitle("Клієнти");
        $this->registry['customer'] = $this->getModel('Customer')->initCollection()
               ->getCollection()->select();

        $this->setView();
        $this->renderLayout();
    }

    public function LoginAction()
    {
        $this->setTitle("Вхід");
        if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST')
        {
            $email = filter_input(INPUT_POST, 'email');
            $password = md5(filter_input(INPUT_POST, 'password'));
            $params =array (
                'email'=>$email,
                'password'=> $password
            );
            $customer = $this->getModel('customer')->initCollection()
                    ->filter($params)
                    ->getCollection()
                    ->selectFirst();
            if(!empty($customer)) {
                $_SESSION['id'] = $customer['customer_id'];
                Helper::redirect('/index/index');
            } else {
                $this->invalid_password = 1;
            }
        }
        $this->setView();
        $this->renderLayout();
    }

    
    public function LogoutAction()
    {
        
        $_SESSION = [];

       // expire cookie

        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 3600, "/");
        }

        session_destroy();
        Helper::redirect('/index/index');
    }
    
    public function registerAction() {
        if (isset($_SESSION['id'])) {
            Helper::redirect('/index/index');
        }

        $this->setTitle('Зареєструватися');
        $model = $this->getModel('Customer');
        $values = $model->getPostValues();
        if ($values) {
            if ($this->validPostData($values)) {
                switch ($model->registerUser($values)):
                    case false: $this->setView('error_email');
                        break;
                    case true: $this->setView('success_register');
                        break;
                endswitch;
                $this->RenderLayout();
            } else {
                $this->registry['userdata'] = $values;
                $this->setView();
                $this->RenderLayout();
            }
        } else {
            $this->setView();
            $this->RenderLayout();
        }
    }
    
    
    
//      public function registerAction() {
//        $customer = $this->getModel('Customer');
//        $this->setTitle("Зареєструватися");
//       $values = $customer->getPostValues();
//            if ($values) {
//                    $customer->addItem($values);
//                    $this->setView('adddone');
//                    $this->renderLayout();
//                                        
//                } else {
//                $this->setView();
//                $this->renderLayout();}
//      }
        
        
//        if ($values = $customer->getPostValues()) {
//            $this->addItem($values);
//            //$customer->register($values);
//        }
//        $this->setView();
//        $this->renderLayout();
//        
//         $model = $this->getModel('Product');
//            $this->setTitle("Додавання товару");
//            $id = $this->getId();
//            $values = $model->getPostValues();
//            if ($values) {
//                if ($this->validation($values)) {
//                    $model->addItem($values);
//                    $this->setView('adddone');
//                    $this->renderLayout();
//                    
//                     
//                } else {
//                    $this->registry['product'] = $values;
//                    $this->setView();
//                    $this->renderLayout();
//                   
//                }
//            } else {
//                $this->setView();
//                $this->renderLayout();
//                
//            }
        
        
        
   // }

}
