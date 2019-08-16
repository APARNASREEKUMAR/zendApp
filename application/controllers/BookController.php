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
        $this->view->headTitle('Add Book ','PREPEND');
        $form = new Form_AddBookForm();
        $this->view->form = $form;

        $request = $this->getRequest();

        if($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $book = new Application_Model_Book($form->getValues());
                $mapper  = new Application_Model_BookMapper();
                $mapper->save($book);
                $this->_redirect('book/list');
            }
        }
 
        $this->view->form = $form;
    }

    public function editAction()
    {
        $request = $this->getRequest();
        $this->view->headTitle('Edit Book ','PREPEND');
        //Getting the If for Edit
        $id = ($this->_request->getParam('id'))?($this->_request->getParam('id')):$request->id;
        $book = new Application_Model_Book();
        $mapper = new Application_Model_BookMapper();
        $book = $mapper->find($id,$book);
        $form = new Form_EditBookForm();
        $data = array(
            'id' => $book->id,
            'bookName' => $book->bookname,
            'author' => $book->author,
            'year' => $book->year,
            'description' =>$book->description
        );
        $this->view->form = $form->populate($data);
  
        if($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                $book = new Application_Model_Book($form->getValues());
                $mapper  = new Application_Model_BookMapper();
                $mapper->save($book);
                $this->_redirect('book/list');
            }
        }
    }

    public function deleteAction()
    {
        $request = $this->getRequest();
        $this->view->headTitle('Edit Book ','PREPEND');
        //Getting the If for Edit
        $id = ($this->_request->getParam('id'))?($this->_request->getParam('id')):$request->id;
        $book = new Application_Model_Book();
        $mapper = new Application_Model_BookMapper();
        $book = $mapper->find($id,$book);
    }

    public function listAction()
    {
       
       $this->view->headTitle('Book Listing ','PREPEND');
       $book = new Application_Model_BookMapper();
       $this->view->books = $book->fetchAll();

    }


}









