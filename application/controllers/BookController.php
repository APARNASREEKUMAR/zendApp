<?php

class BookController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       
    }

    public function addAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }

    public function deleteAction()
    {
        // action body
    }

    public function listAction()
    {
       
       $this->view->headTitle('Listing Page ','PREPEND');

        $booksTBL = new Application_Model_DbTable_Book();
       $data = $booksTBL->fetchAll();
    //    echo '<pre>';var_dump($data);
      $this->view->books = $booksTBL->fetchAll();
    //    print_r($this->books);
    }


}









