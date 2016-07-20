<?php

class HotspotsController extends AppController {

    public $theme = 'SbAdmin';
    public $helpers = array( 'Table' );
    public $uses = array('Hotspot','Radcheck','Radusergroup', 'Radacct');


    public function beforeFilter() {
        parent::beforeFilter();
        #$this->Auth->allow('add');
    }

    public function disconnect($id=null){

        $this->Hotspot->read(null,$id);
        $this->Hotspot->set(array('disconnect'=> 1));                
        if( $this->Hotspot->save() ) {
               $this->Session->setFlash(__('Sent for disconnection'), 'flash_success');
        } else {
               $this->Session->setFlash(__('Failed to disconnect'), 'flash_error');
        }
        return $this->redirect(array('action' => 'index'));       
    }

    public function index() {
        if ($this->request->is('post')) {
            #debug($this->data);
        }
        $this->Hotspot->recursive = 0;
        $this->paginate = array(
            'fields' => array('Hotspot.id', 'Package.title','Package.volume', 'Hotspot.username','Hotspot.expired', 'Hotspot.created'),
            'limit'  => 20,
            'order'  => array( 'id' => 'desc' ),
                             
        );

        $this->set( 'hotspots', $this->paginate() );
    }

    public function search(){
        $keyword = $_GET['keyword'];
        $this->Hotspot->recursive = 0;
        $this->paginate = array(
                        'fields' => array('Hotspot.id', 'Package.title', 'Hotspot.username','Hotspot.expired', 'Hotspot.created'),
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
        $this->set('hotspot', $this->Hotspot->findById($id));
    }

    function ticket(){
        $packages = $this->Hotspot->Package->find('list');
        $this->set(array('packages' => $packages));

        if ($this->request->is('post')) {
            $this->Hotspot->set($this->request->data);
            if($this->Hotspot->validates()){

                for($n=0;$n<$this->request->data['Hotspot']['number_of_tickets']; $n++){
                    // do stuff with valid data
                    $chars = "0123456789";
                    $username = "";
                    for ($i = 0; $i < 8; $i++) {
                        $username .= $chars[mt_rand(0, strlen($chars)-1)];
                    }

                    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    $password = "";
                    for ($i = 0; $i < 5; $i++) {
                        $password .= $chars[mt_rand(0, strlen($chars)-1)];
                    }
                    
                    $this->Hotspot->create();
                    $this->request->data['Hotspot']['user_id'] = $this->Auth->user('id');
                    $this->request->data['Hotspot']['username'] = $username;
                    $this->request->data['Hotspot']['password'] = $password;
                    if ($this->Hotspot->save($this->request->data)) {
                        $this->add_to_radius();
                        } else {
                        $this->Session->setFlash(__('The ticket could not be saved. Please, try again.'), 'flash_error');
                        return $this->redirect(array('action' => 'index'));
                    }

                }// for
                $this->Session->setFlash(__('Tickets successfully generated.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));   

            } else {
                echo 'no validated';

            }
        }
    }

    public function add() {
        $packages = $this->Hotspot->Package->find('list');
        $this->set(array('packages' => $packages));
        if ($this->request->is('post')) {
            #$this->add_to_radius($this->request->data);

            $this->Hotspot->create();
            $this->request->data['Hotspot']['user_id'] = $this->Auth->user('id');
            if ($this->Hotspot->save($this->request->data)) {
                $this->add_to_radius();
                $this->Session->setFlash(__('The ticket has been saved'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ticket could not be saved. Please, try again.'), 'flash_error');
            }
       }
    }


    public function add_to_radius(){

        # clear any instance of same username
                                
        $username = $this->request->data['Hotspot']['username'];
        $conditions = array('username' => $username);
                                                          
        $this->Radusergroup->deleteAll($conditions, FALSE);
        $this->Radcheck->deleteAll($conditions, FALSE); 

        ## Now add data to radius

        # Password
        $this->Radcheck->create();
        $this->Radcheck->set(array(
            'username'  => $this->request->data['Hotspot']['username'],
            'op'        => ':=',
            'attribute' => 'Cleartext-Password',
            'value'     => $this->request->data['Hotspot']['password']
        ));
        $this->Radcheck->save();

        # Mikrotik-Rate-Limit
        #$this->Radcheck->create();
        #$this->Radcheck->set(array(
        #    'username'  => $this->request->data['Hotspot']['username'],
        #    'op'        => '=',
        #    'attribute' => 'Mikrotik-Total-Limit',
        #    'value'     => "56k/56k"
        #));
        #$this->Radcheck->save();


        # Simultaneous
        $this->Radcheck->create();
        $this->Radcheck->set(array(
            'username' => $this->request->data['Hotspot']['username'],
            'op' => ':=',
            'attribute' => 'Simultaneous-Use',
            'value' => $this->request->data['Hotspot']['concurrent'] 
        ));
        $this->Radcheck->save();

                # Max-All-Session | noresetcounter
                #$this->Radcheck->create();
                #$this->Radcheck->set(array(
                #             'username' => $this->request->data['Hotspot']['username'],
                #                   'op' => ':=',
                #            'attribute' => 'Max-All-Session',
                #                'value' => 540000
                #            ));
                #$this->Radcheck->save();


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
             

         # Idle-Timeout
         $this->Radcheck->create();
         $this->Radcheck->set(array(
             'username' => $this->request->data['Hotspot']['username'],
                   'op' => ':=',
            'attribute' => 'Idle-Timeout',
                'value' => 900
         ));
         $this->Radcheck->save();

         # Priority
		 $package = $this->Hotspot->Package->findById($this->request->data['Hotspot']['package_id']);
         $this->Radusergroup->create();
         $this->Radusergroup->set(array(
            'username'  => $this->request->data['Hotspot']['username'],
            'priority'  => 1,
            //'groupname' => $package['Package']['title']
            'groupname' => $package['Package']['id']
         ));
         $this->Radusergroup->save();

         # Mikrotik-Total-Limit-Gigawords := "6", // equivalent to 24GB

    }

    public function edit($id = null) {
        $this->Hotspot->id = $id;
        $packages = $this->Hotspot->Package->find('list');
        $this->set(array('packages' => $packages));
        
        if (!$this->Hotspot->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Hotspot']['user_id'] = $this->Auth->user('id');
            if ($this->Hotspot->save($this->request->data)) {
                $this->add_to_radius();
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
        foreach($this->request->data['checkList'] as $id){
            if(!empty($id)){
                #$hotspot = $this->Hotspot->find('first', array('Hotspot.id' => $id));
                $this->Hotspot->recursive= -1;
                $hotspot = $this->Hotspot->findById($id);

                $username = $hotspot['Hotspot']['username'];
                $conditions = array('username' => $username);
                           
                $this->Radusergroup->deleteAll($conditions, FALSE);
                $this->Radcheck->deleteAll($conditions, FALSE);  
                $this->Radacct->deleteAll($conditions, FALSE); 

                $this->Hotspot->id =  $id;
                $this->Hotspot->delete();               
            }
        }
        $this->Session->setFlash(__('The tickets has been deleted'), 'flash_success');
        return $this->redirect(array('action' => 'index'));
    }


    public function delete($id = null) {
        // Prior to 2.5 use
        #$this->request->onlyAllow('post');

        #$this->request->allowMethod('put');
        #
        

        $this->Hotspot->id = $id;
        $hotspot = $this->Hotspot->find('first');
        
        if (!$this->Hotspot->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        if ($this->Hotspot->delete()) {

            # delete Radcheck by username
            # // Delete with array conditions similar to find()
            # $this->Comment->deleteAll(array('Comment.spam' => true), false);
            $username = $hotspot['Hotspot']['username'];
            $conditions = array('username' => $username);
       
            $this->Radusergroup->deleteAll($conditions, FALSE); 
            $this->Radcheck->deleteAll($conditions, FALSE); 
            $this->Radacct->deleteAll($conditions, FALSE); 
       
       
            $this->Session->setFlash(__('Hotspot ID:'.$id.' has been deleted'), 'flash_success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Hotspot was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
