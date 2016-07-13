<?php

class NasController extends AppController {

    public $theme = 'SbAdmin';
    public $helpers = array( 'Table' );
    public $uses = array('Nas','Radgroupreply');


    public function beforeFilter() {
        parent::beforeFilter();
        #$this->Auth->allow('add');
    }

    public function index() {
        if ($this->request->is('post')) {
            #debug($this->data);
        }
        $this->Nas->recursive = 0;
        $this->paginate = array(
            //'fields' => array('Nas.id', 'Nas.title','Nas.upload', 'Nas.download'),
            'limit'  => 20,
            'order'  => array( 'id' => 'desc' ),
                             
        );

        $this->set( 'nass', $this->paginate() );
    }

    public function search(){
        $keyword = $_GET['keyword'];
        $this->Nas->recursive = 0;
        $this->paginate = array(
                        //'fields' => array('Nas.id', 'Nas.groupname','Nas.role', 'Nas.created'),
                        'limit'  => 20,
                        'order'  => array( 'id' => 'desc' ),
                        'conditions' => array('Nas.groupname LIKE' =>  $keyword . '%'),
                                                                
                        );
        $results =  $this->paginate();
        #debug($results);
               if(empty($results)){
                    $this->Session->setFlash(__('You search yield no results. Please try another keyword'), 'flash_error');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->set( 'nas', $this->paginate() );
                    $this->render('index');
                }
    }

    public function view($id = null) {
        $this->Nas->id = $id;
        if (!$this->Nas->exists()) {
            throw new NotFoundException(__('Invalid Nas'));
        }
        $this->set('Nas', $this->Nas->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            #$this->add_to_radius($this->request->data);

            $this->Nas->create();
            $this->request->data['Nas']['user_id'] = $this->Auth->user('id');
            if ($this->Nas->save($this->request->data)) {
                    $this->Session->setFlash(__('The nas has been saved'), 'flash_success');
                    return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash( __('The Nas could not be saved. Please, try again.'), 'flash_error');
            }
        }
    }


    public function edit($id = null) {
        $this->Nas->id = $id;
        if (!$this->Nas->exists()) {
            throw new NotFoundException(__('Invalid Nas'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Nas']['user_id'] = $this->Auth->user('id');
            if ($this->Nas->save($this->request->data)) {
                $this->Session->setFlash(__('The Nas has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The Nas could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Nas->findById($id);
            unset($this->request->data['Nas']['pwd']);
        }
    }

    public function mass_delete(){
        $this->request->allowMethod('post');
        #debug($this->data);
        foreach($this->data['checkList'] as $id){
            if(!empty($id)){

                $this->Nas->id = $id;
                $this->Nas->delete();               
            }
        }
        $this->Session->setFlash(__('The Nass has been deleted'), 'flash_success');
        return $this->redirect(array('action' => 'index'));
    }


    public function delete($id = null) {
        // Prior to 2.5 use
        #$this->request->onlyAllow('post');

        #$this->request->allowMethod('put');

        $this->Nas->id = $id;
        if (!$this->Nas->exists()) {
            throw new NotFoundException(__('Invalid Nas'));
        }

        $this->Nas->recursive= -1;
        $nas = $this->Nas->findById($id);
        if ($this->Nas->delete()) {

            $this->Session->setFlash(__('Nas ID:'.$id.' has been deleted'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Nas was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
