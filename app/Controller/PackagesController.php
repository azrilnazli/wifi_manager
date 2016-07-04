<?php

class PackagesController extends AppController {

    public $theme = 'SbAdmin';
    public $helpers = array( 'Table' );
    public $uses = array('Package','Radgroupreply');


    public function beforeFilter() {
        parent::beforeFilter();
        #$this->Auth->allow('add');
    }

    public function index() {
        if ($this->request->is('post')) {
            #debug($this->data);
        }
        $this->Package->recursive = 0;
        $this->paginate = array(
            'fields' => array('Package.id', 'Package.title','Package.upload', 'Package.download'),
            'limit'  => 20,
            'order'  => array( 'id' => 'desc' ),
                             
        );

        $this->set( 'packages', $this->paginate() );
    }

    public function search(){
        $keyword = $_GET['keyword'];
        $this->Package->recursive = 0;
        $this->paginate = array(
                        'fields' => array('Package.id', 'Package.username','Package.role', 'Package.created'),
                        'limit'  => 20,
                        'order'  => array( 'id' => 'desc' ),
                        'conditions' => array('Package.username LIKE' =>  $keyword . '%'),
                                                                
                        );
        $results =  $this->paginate();
        #debug($results);
               if(empty($results)){
                    $this->Session->setFlash(__('You search yield no results. Please try another keyword'), 'flash_error');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->set( 'packages', $this->paginate() );
                    $this->render('index');
                }
    }

    public function view($id = null) {
        $this->Package->id = $id;
        if (!$this->Package->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        $this->set('ticket', $this->Package->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            #$this->add_to_radius($this->request->data);

            $this->Package->create();
            if ($this->Package->save($this->request->data)) {
              
                # Password
                $this->Radgroupreply->create();
                $this->Radgroupreply->set(array(
                            'groupname'  => $this->request->data['Package']['title'],
                            'op'        => ':=',
                            'attribute' => 'Ascend-Xmit-Rate',
                            'value'     => $this->request->data['Package']['upload']
                            ));
                $this->Radgroupreply->save();

                # Simultaneous
                $this->Radgroupreply->create();
                $this->Radgroupreply->set(array(
                            'groupname' => $this->request->data['Package']['title'],
                                   'op' => ':=',
                            'attribute' => 'Ascend-Data-Rate',
                                'value' => $this->request->data['Package']['download']
                            ));
                $this->Radgroupreply->save();



       		    # Idle-Timeout
                $this->Radgroupreply->create();
                $this->Radgroupreply->set(array(
                             'groupname' => $this->request->data['Package']['title'],
                                   'op'  => ':=',
                            'attribute'  => 'Idle-Timeout',
                                'value'   => 900
                            ));
                $this->Radgroupreply->save();

                  #$this->add_to_radius();
                  $this->Session->setFlash(__('The ticket has been saved'), 'flash_success');
                  return $this->redirect(array('action' => 'index'));
            } else {

                #if ($this->Package->validates()) {
                    // it validated logic
                #} else {
                    // didn't validate logic
                #    $errors = $this->Package->validationErrors;
                #    $this->set('errors', $errors);
                #}

                $this->Session->setFlash(
                    __('The ticket could not be saved. Please, try again.'), 'flash_error'
                );
            }
        }
    }

    public function edit($id = null) {
        $this->Package->id = $id;
        if (!$this->Package->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Package->save($this->request->data)) {
                $this->Session->setFlash(__('The ticket has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The ticket could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Package->findById($id);
            unset($this->request->data['Package']['pwd']);
        }
    }

    public function mass_delete(){
        $this->request->allowMethod('post');
        #debug($this->data);
        foreach($this->data['checkList'] as $id){
            if(!empty($id)){
                $this->Package->id = $id;
                $this->Package->delete();               
            }
        }
        $this->Session->setFlash(__('The tickets has been deleted'), 'flash_success');
        return $this->redirect(array('action' => 'index'));
    }


    public function delete($id = null) {
        // Prior to 2.5 use
        #$this->request->onlyAllow('post');

        #$this->request->allowMethod('put');

        $this->Package->id = $id;
        if (!$this->Package->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        if ($this->Package->delete()) {

            # delete Radgroupreply by username
            # // Delete with array conditions similar to find()
            # $this->Comment->deleteAll(array('Comment.spam' => true), false);
      
            $this->Session->setFlash(__('Package ID:'.$id.' has been deleted'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Package was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
