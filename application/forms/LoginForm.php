<?php
class Form_LoginForm extends Zend_Form
{
    public function __construct($option = null)
    {
        parent::__construct($option);
        $this->setName('login');

        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('User Name:')
             ->setRequired();

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password:')
                 ->setRequired(true);     

        $login =new  Zend_Form_Element_Submit('login');
        $login->setLabel('Login');

        $this->addElements(array($name,$password,$login));    
        $this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl().'/authentication/login');  
    }
}