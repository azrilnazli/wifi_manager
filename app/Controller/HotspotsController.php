<?php

class HotspotsController extends AppController {

    public $theme = 'SbAdmin';
    public $helpers = array( 'Table' );
    public $uses = array('Hotspot','Radcheck');


    public function beforeFilter() {
        parent::beforeFilter();
        #$this->Auth->allow('add');
    }

    public function index() {
        if ($this->request->is('post')) {
            #debug($this->data);
        }
        $this->Hotspot->recursive = 0;
        $this->paginate = array(
            'fields' => array('Hotspot.id', 'Hotspot.username','Hotspot.expired', 'Hotspot.created'),
            'limit'  => 20,
            'order'  => array( 'id' => 'desc' ),
                             
        );

        $this->set( 'hotspots', $this->paginate() );
    }

    public function search(){
        $keyword = $_GET['keyword'];
        $this->Hotspot->recursive = 0;
        $this->paginate = array(
                        'fields' => array('Hotspot.id', 'Hotspot.username','Hotspot.role', 'Hotspot.created'),
                        'limit'  => 20,
                        'order'  => array( 'id' => 'desc' ),
                        'conditions' => array('Hotspot.username LIKE' =>  $keyword . '%'),
                                                                
                        );
        $results =  $this->paginate();
        #debug($results);
               if(empty($results)){
                    $this->Session->setFlash(__('You search yield no results. Please try another keyword'), 'flash_error');
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->set( 'hotspots', $this->paginate() );
                    $this->render('index');
                }
    }

    public function view($id = null) {
        $this->Hotspot->id = $id;
        if (!$this->Hotspot->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        $this->set('ticket', $this->Hotspot->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            #$this->add_to_radius($this->request->data);

            $this->Hotspot->create();
            if ($this->Hotspot->save($this->request->data)) {
              
                # Password
                $this->Radcheck->create();
                $this->Radcheck->set(array(
                            'username'  => $this->request->data['Hotspot']['username'],
                            'op'        => ':=',
                            'attribute' => 'Cleartext-Password',
                            'value'     => $this->request->data['Hotspot']['password']
                            ));
                $this->Radcheck->save();

                # Simultaneous
                $this->Radcheck->create();
                $this->Radcheck->set(array(
                             'username' => $this->request->data['Hotspot']['username'],
                                   'op' => ':=',
                            'attribute' => 'Simultaneous-Use',
                                'value' => 1
                            ));
                $this->Radcheck->save();

                # Upload / Download Limit
                # Expiration Date | Expiration := 01 Sep 2005 12:00:00
                $day    = $this->request->data['Hotspot']['expired']['day'];
                $month_number   = $this->request->data['Hotspot']['expired']['month'];
                $month_name     = date("F", mktime(0, 0, 0, $month_number, 10));
                $year   = $this->request->data['Hotspot']['expired']['year'];
                $hour   = $this->request->data['Hotspot']['expired']['hour'];
                $min    = $this->request->data['Hotspot']['expired']['min'];

                $expiration = "{$day} {$month_name} {$year} {$hour}:{$min}:00";

		        $this->Radcheck->create(); 
                $this->Radcheck->set(array(
                             'username' => $this->request->data['Hotspot']['username'],
                                   'op' => ':=',
                            'attribute' => 'Expiration',
                                'value' => $expiration
                            ));
                $this->Radcheck->save();              
                # Session-Timeout


                  #$this->add_to_radius();
                  $this->Session->setFlash(__('The ticket has been saved'), 'flash_success');
                  return $this->redirect(array('action' => 'index'));
            } else {

                #if ($this->Hotspot->validates()) {
                    // it validated logic
                #} else {
                    // didn't validate logic
                #    $errors = $this->Hotspot->validationErrors;
                #    $this->set('errors', $errors);
                #}

                $this->Session->setFlash(
                    __('The ticket could not be saved. Please, try again.'), 'flash_error'
                );
            }
        }
    }

    public function edit($id = null) {
        $this->Hotspot->id = $id;
        if (!$this->Hotspot->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Hotspot->save($this->request->data)) {
                $this->Session->setFlash(__('The ticket has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The ticket could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Hotspot->findById($id);
            unset($this->request->data['Hotspot']['pwd']);
        }
    }

    public function mass_delete(){
        $this->request->allowMethod('post');
        #debug($this->data);
        foreach($this->data['checkList'] as $id){
            if(!empty($id)){
                $this->Hotspot->id = $id;
                $this->Hotspot->delete();               
            }
        }
        $this->Session->setFlash(__('The tickets has been deleted'), 'flash_success');
        return $this->redirect(array('action' => 'index'));
    }


    public function delete($id = null) {
        // Prior to 2.5 use
        $this->request->onlyAllow('post');

        #$this->request->allowMethod('put');

        $this->Hotspot->id = $id;
        if (!$this->Hotspot->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        if ($this->Hotspot->delete()) {

            # delete Radcheck by username
            # // Delete with array conditions similar to find()
            # $this->Comment->deleteAll(array('Comment.spam' => true), false);
      
            $this->Session->setFlash(__('Hotspot ID:'.$id.' has been deleted'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Hotspot was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}