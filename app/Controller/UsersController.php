<?php

class UsersController extends AppController {

    public $theme = 'SbAdmin';
    public $helpers = array( 'Table' );

    public function beforeFilter() {
        parent::beforeFilter();
        #$this->Auth->allow('add');
    }

    public function login() {
        $this->layout = "login";
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            //$this->Session->setFlash(__('Invalid username or password, try again'));
            $this->Session->setFlash(__('Invalid username or password, try again'), 'flash_error');
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function home(){}

    public function index() {
        if ($this->request->is('post')) {
           # debug($this->data);
        }
        $this->User->recursive = 0;
        $this->paginate = array(
            'fields' => array('User.id', 'User.username','User.role', 'User.created'),
            'limit'  => 3,
            'order'  => array( 'id' => 'desc' ),
                             
        );

        $this->set( 'users', $this->paginate() );
    }

    public function search(){
        $keyword = $_GET['keyword'];
        $this->User->recursive = 0;
        $this->paginate = array(
                        'fields' => array('User.id', 'User.username','User.role', 'User.created'),
                        'limit'  => 3,
                        'order'  => array( 'id' => 'desc' ),
                        'conditions' => array('User.username LIKE' =>  $keyword . '%'),
                                                                
                        );
        $results =  $this->paginate();
        #debug($results);
               if(empty($results)){
                    $this->Session->setFlash(__('You search yield no results. Please try another keyword'), 'flash_error');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->set( 'users', $this->paginate() );
                    $this->render('index');
                }
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function profile(){
        $this->User->id = $this->Auth->user('id');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById(  $this->Auth->user('id') ));
        $this->render('view');
    }

   public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                  #$this->Session->setFlash(__('The user has been saved'));
                  $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {

                #if ($this->User->validates()) {
                    // it validated logic
                #} else {
                    // didn't validate logic
                #    $errors = $this->User->validationErrors;
                #    $this->set('errors', $errors);
                #}

                $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.'), 'flash_error'
                );
            }
        }
    }


    public function settings() {
        $this->User->id = $this->Auth->user('id');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById( $this->Auth->user('id') );
            unset($this->request->data['User']['pwd']);
        }
        $this->render('edit');
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['pwd']);
        }
    }

    public function mass_delete(){
        $this->request->allowMethod('post');
        #debug($this->data);
        foreach($this->data['checkList'] as $id){
            if(!empty($id)){
                $this->User->id = $id;
                $this->User->delete();               
            }
        }
        $this->Session->setFlash(__('The users has been deleted'), 'flash_success');
        return $this->redirect(array('action' => 'index'));
    }


    public function delete($id = null) {
        // Prior to 2.5 use
        $this->request->onlyAllow('post');

        #$this->request->allowMethod('put');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User ID:'.$id.' has been deleted'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
