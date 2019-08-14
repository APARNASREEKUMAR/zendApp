<?php
class Application_Model_LibraryAcl extends Zend_Acl
{
    public function __construct()
    {
        $this->add(new Zend_Acl_Resource('authentication'));
        $this->add(new Zend_Acl_Resource('book'));
        $this->add(new Zend_Acl_Resource('list'),'book');
        $this->add(new Zend_Acl_Resource('add'),'book');
        $this->add(new Zend_Acl_Resource('edit'),'book');
        $this->addRole(new Zend_Acl_Role('user'));
        $this->addRole(new Zend_Acl_Role('admin'),'user');
        
        $this->allow('user','authentication','login');
        $this->allow('user','authentication','logout');
        $this->allow('user','book','list');
        $this->allow('admin','book','add');
        $this->allow('admin','book','edit');

    }
}