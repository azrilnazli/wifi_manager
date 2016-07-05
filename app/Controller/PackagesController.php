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
            //'fields' => array('Package.id', 'Package.title','Package.upload', 'Package.download'),
            'limit'  => 20,
            'order'  => array( 'id' => 'desc' ),
                             
        );

        $this->set( 'packages', $this->paginate() );
    }

    public function search(){
        $keyword = $_GET['keyword'];
        $this->Package->recursive = 0;
        $this->paginate = array(
                        //'fields' => array('Package.id', 'Package.groupname','Package.role', 'Package.created'),
                        'limit'  => 20,
                        'order'  => array( 'id' => 'desc' ),
                        'conditions' => array('Package.groupname LIKE' =>  $keyword . '%'),
                                                                
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
                    $this->add_to_radius($this->Package->id);           
                    $this->Session->setFlash(__('The package has been saved'), 'flash_success');
                    return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash( __('The ticket could not be saved. Please, try again.'), 'flash_error');
            }
        }
    }


    public function add_to_radius($id=null){
                # delete any record with matching groupname
                $groupname = $id;
                $conditions = array('groupname' => $groupname);
                $this->Radgroupreply->deleteAll($conditions, FALSE);

                # Mikrotik-Total-Limit 1 = 4100 Mb
                $this->Radgroupreply->create();
                $this->Radgroupreply->set(array(
                            'groupname'  => $id,
                            'op'        => ':=',
                            'attribute' => 'Mikrotik-Total-Limit-Gigawords',
                            'value'     => $this->request->data['Package']['volume']
                            ));
                $this->Radgroupreply->save();

                # Ascend-Xmit-Rate
                $this->Radgroupreply->create();
                $this->Radgroupreply->set(array(
                            'groupname' => $id,
                                   'op' => ':=',
                            'attribute' => 'Ascend-Xmit-Rate',
                                'value' => $this->request->data['Package']['download'] 
                            ));
                $this->Radgroupreply->save();

                # Ascend-Data-Rate
                $this->Radgroupreply->create();
                $this->Radgroupreply->set(array(
                            'groupname' => $id,
                                   'op' => ':=',
                            'attribute' => 'Ascend-Data-Rate',
                                'value' => $this->request->data['Package']['upload'] 
                            ));
                $this->Radgroupreply->save();



       		    # Idle-Timeout
                $this->Radgroupreply->create();
                $this->Radgroupreply->set(array(
                             'groupname' => $id,
                                   'op'  => ':=',
                            'attribute'  => 'Idle-Timeout',
                                'value'   => 900
                            ));
                $this->Radgroupreply->save();

                  #$this->add_to_radius();
                  $this->Session->setFlash(__('The ticket has been saved'), 'flash_success');
                  return $this->redirect(array('action' => 'index'));
    }

    public function edit($id = null) {
        $this->Package->id = $id;
        if (!$this->Package->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Package->save($this->request->data)) {
                $this->add_to_radius();
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


                #$this->Package->recursive= -1;
                #$package = $this->Package->findById($id);

                #$groupname = $package['Package']['title'];
                #$conditions = array('groupname' => $groupname);
                $conditions = array('groupname' => $id);

                $this->Radgroupreply->deleteAll($conditions, FALSE);

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

        $this->Package->recursive= -1;
        $package = $this->Package->findById($id);
        if ($this->Package->delete()) {

            # delete Radgroupreply by groupname
            # // Delete with array conditions similar to find()
            # $this->Comment->deleteAll(array('Comment.spam' => true), false);

            $groupname = $id;
            #$groupname = $package['Package']['title'];
            $conditions = array('groupname' => $groupname);

            $this->Radgroupreply->deleteAll($conditions, FALSE);

            $this->Session->setFlash(__('Package ID:'.$id.' has been deleted'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Package was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
